<?php

namespace App\Http\Controllers\Liquidation
;


use App\Http\Controllers\Controller;
use App\Models\ProcedureExportation;
use App\Models\CaracteristiqueProduitProcedureExportation;
use App\Models\Pay;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\Usager;
use App\Models\Poste;
use App\Models\TypeProduit;
use App\Models\DemandeAnnuelle;
use App\Models\EspeceProduit;
use App\Models\Liquidation;
use App\Models\Intervenant;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;


class LiquidationController extends Controller
{

    protected $data = []; 
    protected $ProcedureExportation =null; 
    protected $modelCaracProdExportation = null;
    protected $modelLiquidation= null;
    protected $request =null; 
    protected $home =null; 
    public function __construct()
    {
        $this->ProcedureExportation = new ProcedureExportation();
         $this->modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();
         $this->modelLiquidation= new Liquidation
();
        $this->home = new HomeController();
        $this->request = new Request();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {



    }

    
    public function liste($details)
    {
         session(['back' => Route('liquidation', ['details' => in_array($details,array("attente")) ? ($details) : ('attente')])]);
        $data = [];
         $data['details']  = $details;
        $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_by_statut_for_intervenant(12);

        return view('/liquidation', $data);
    }

     public function liquider($id){

         $procedureEnAttentesDetails = $this->ProcedureExportation->get_procedure_exportation_all_info_by_id_for_liquidation($id)->first();

         $attente = 1;

        if($procedureEnAttentesDetails!=null)
        {
            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);
            $gradeAgent = Intervenant::where('id_user',Auth::user()->id)->first();
            if ($gradeAgent==null) 
                return redirect('/home')->with('warning', "Vous n'etes pas éligible à éffectuer cette action !");

            return view('/liquider', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent'));
        }
        else
        {
            return redirect('/Liquidation/attente')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas !" );
        }

    }


   public function regle_Liquidation($id){

         $procedureEnAttentesDetails = $this->modelLiquidation->get_Liquidation_all_info_by_process($id,usager_id_user(Auth::user()->id)->id)->first();

         $attente = 1;

        if($procedureEnAttentesDetails!=null)
        {
            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);
            $gradeAgent = Intervenant::where('id',$procedureEnAttentesDetails->autorite)->first();
            if ($gradeAgent==null) 
                return redirect('/home')->with('warning', "Vous n'etes pas éligible à éffectuer cette action !");
            return view('/regle_Liquidation', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent'));
        }
        else
        {
            return redirect('/Liquidation/attente_usager')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas !" );
        }

    }




    public function close(Request $request)
        {
                
                $old_id = $request->id;
                $process = $this->ProcedureExportation->get_procedure_exportation_all_info_by_id($old_id)->first();
                if($process){
                    
                        ProcedureExportation::where('id',$old_id)->update(['id_statut' => 13]);
                       

                        //Procedure
                        $data = [
                                    'id_procedure_exportation' => $old_id,
                                    'autorite' => intervenant_user_id(Auth::user()->id)->id,
                                    'observation' => $request->observation,
                        ];
                        $Liquidation = Liquidation::create($data);
                       
                        //DOC
                            if ($request->doc != null && $request->doc->isValid())
                            {
                               
                                $full_name = $process->prenom_user."_".$process->nom_user;
                                $file_path = "public/liquidation/".date('Y')."/".$full_name."/";
                                $file_path2 = "liquidation/".date('Y')."/".$full_name."/";
                                $file_path = perform_links($file_path);
                                $file_extension= $request->doc->getClientOriginalExtension();
                                $pdf_name = perform_links2(perform_links('liquidation_'.$process->numero."_".$full_name)).'.'.$file_extension;
                                $request->doc->storeAs($file_path,$pdf_name);


                                //$bfu = Bfu::create($data);
                                $doc = new Document();
                                $doc->nom_fichier =$pdf_name;
                                $doc->nom_entite = 'liquidations';
                                $doc->entite_id = $old_id;
                                $doc->chemin = $file_path2;
                                $doc->id_categorie_document = 18;
                                $doc->save();
                               
                            }
                        //END DOC
                        notificationLiquidationJointes($old_id);
                        return redirect('/home')->with('success', "La procédure a été fermée avec succès !");

                   
                }else{
                    return redirect('/Liquidation/attente')->with('warning', "Action non autorisé !");
                }
                


        } 

       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
