<?php

namespace App\Http\Controllers\Bfu
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
use App\Models\Bfu;
use App\Models\Intervenant;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Carbon\Carbon;



class BfuController extends Controller
{

    protected $data = []; 
    protected $ProcedureExportation =null; 
    protected $modelCaracProdExportation = null;
    protected $modelBfu= null;
    protected $request =null; 
    protected $home =null; 
    public function __construct()
    {
        $this->ProcedureExportation = new ProcedureExportation();
         $this->modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();
         $this->modelBfu= new Bfu
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
        session(['back' => Route('bfu', ['details' => in_array($details,array("toute", "attente_usager", "regle", "delivre")) ? ($details) : ('attente')])]);

        
        $data = [];
         $data['details']  = $details;
        switch ($details) {
            case 'attente':
                $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_by_statut_for_intervenant(10);
                break;
            case 'attente_usager':
                $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_by_statut(usager_id_user(Auth::user()->id)->id,11);
                break; 
            case 'regle':
                $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_by_statut(usager_id_user(Auth::user()->id)->id,12);
                break;
                case 'delivre':
                $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_by_statut_for_intervenant(11);

                break;

            default:
               $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_by_statut_for_intervenant(10);
                break;
        }

        return view('/liste_procedure_bfu', $data);
    }

     public function joindre_bfu($id){

         $procedureEnAttentesDetails = $this->ProcedureExportation->get_procedure_exportation_all_info_by_id($id)->first();

         $attente = 1;

        if($procedureEnAttentesDetails!=null)
        {
            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);
            $gradeAgent = Intervenant::where('id_user',Auth::user()->id)->first();
            if ($gradeAgent==null) 
                return redirect('/home')->with('warning', "Vous n'etes pas éligible à éffectuer cette action !");
            return view('/joindre_bfu', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent'));
        }
        else
        {
            return redirect('/bfu/attente')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas !" );
        }

    }


   public function regle_bfu($id){

         $procedureEnAttentesDetails = $this->modelBfu->get_bfu_all_info_by_process($id,usager_id_user(Auth::user()->id)->id)->first();

         $attente = 1;

        if($procedureEnAttentesDetails!=null)
        {
            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);
            $gradeAgent = Intervenant::where('id',$procedureEnAttentesDetails->autorite)->first();
            if ($gradeAgent==null) 
                return redirect('/home')->with('warning', "Vous n'etes pas éligible à éffectuer cette action !");


            return view('/regle_bfu', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent'));
        }
        else
        {
            return redirect('/bfu/attente_usager')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas !" );
        }

    }




    public function save_bfu(Request $request)
        {
                
                $old_id = $request->id;
                $process = $this->ProcedureExportation->get_procedure_exportation_all_info_by_id($old_id)->first();
                if($process){
                    if ($request->bfu != null && $request->bfu->isValid())
                    {
                       
                        $full_name = $process->prenom_user."_".$process->nom_user;
                        $file_path = "public/bfu/".date('Y')."/".$full_name."/";
                        $file_path2 = "bfu/".date('Y')."/".$full_name."/";
                        $file_path = perform_links($file_path);
                        $file_extension= $request->bfu->getClientOriginalExtension();
                        $pdf_name = perform_links2(perform_links('bfu_'.$process->numero."_".$full_name)).'.'.$file_extension;
                        $request->bfu->storeAs($file_path,$pdf_name);

                        //Procedure
                        $data = [
                                    'id_procedure_exportation' => $old_id,
                                    'autorite' => intervenant_user_id(Auth::user()->id)->id,
                                    'observation' => $request->observation,
                        ];
                        $bfu = Bfu::create($data);
                        $doc = new Document();
                        $doc->nom_fichier =$pdf_name;
                        $doc->nom_entite = 'bfus';
                        $doc->entite_id = $old_id;
                        $doc->chemin = $file_path2;
                        $doc->id_categorie_document = 14;
                        $doc->save();
                        ProcedureExportation::where('id',$old_id)->update(['id_statut' => 11]);

                        notificationBfuJointes($bfu->id);

                        return redirect('/bfu/delivre')->with('success', "La fiche BFU a été enregistrée avec succès !");

                    }else{
                         return redirect('/bfu/attente')->with('error', "Le fichier Bfu joint n'a pas été bien transmis, veuillez réessayer !");
                    }
                }else{
                    return redirect('/bfu/attente')->with('warning', "Action non autorisé !");
                }
                


        } 

        public function save_bfu_regle(Request $request)
        {
                
                $old_id = $request->id;
                $old_id2 = $request->id2;
                $process = $this->ProcedureExportation->get_procedure_exportation_all_info_by_id($old_id2)->first();
            
                if($process){
                    if ($request->bfu != null && $request->bfu->isValid())
                    {
                       
                        $full_name = $process->prenom_user."_".$process->nom_user;
                        $file_path = "public/bfu_regle/".date('Y')."/".$full_name."/";
                        $file_path2 = "bfu_regle/".date('Y')."/".$full_name."/";
                        $file_path = perform_links($file_path);
                        $file_extension= $request->bfu->getClientOriginalExtension();
                        $pdf_name = perform_links2(perform_links('bfu_regle_'.$process->numero."_".$full_name)).'.'.$file_extension;
                        $request->bfu->storeAs($file_path,$pdf_name);


                        //$bfu = Bfu::create($data);
                        $doc = new Document();
                        $doc->nom_fichier =$pdf_name;
                        $doc->nom_entite = 'bfus';
                        $doc->entite_id = $old_id2;
                        $doc->chemin = $file_path2;
                        $doc->id_categorie_document = 15;
                        $doc->save();
                       
                        ProcedureExportation::where('id',$old_id2)->update(['id_statut' => 12]);
                         Bfu::where('id_procedure_exportation',$old_id2)->update(['date_reglement' => Carbon::now()]);

                        notificationBfuRegle($old_id);

                        return redirect('/bfu/regle')->with('success', "La fiche BFU a été enregistrée avec succès !");

                    }else{
                         return redirect('/bfu/attente')->with('error', "Le fichier Bfu joint n'a pas été bien transmis, veuillez réessayer !");
                    }
                }else{
                    return redirect('/bfu/attente')->with('warning', "Action non autorisé !");
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
      public function show($id)
    {
         $data = [];
    
            $process = new ProcedureExportation(); 
            $data['process'] = $process->get_procedure_exportation_all_info_by_id($id); 
            
          // dd( ProcedureExportation::where('id',$id)->get());
        //  dd( $data['process'] );
            if($data['process']!= null && count($data['process']) >0 )
            {    
               $data['process'] = $data['process'][0];
               //$data['usager'] =  Usager::firstWhere('id_user', Auth::user()->id);

                $carateristique = new CaracteristiqueProduitProcedureExportation();
                $data['caracteristique'] =  $carateristique->get_caracteristique_procedure_exportation_by_id($id);
                if( count($data['caracteristique']) <= 0)
                     $data['no_data_found'] = "Aucun produit ajouté à cette procédure"; 
                 return view('/vue_procedure', $data);            
            }else{
                return redirect('process/toute')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas !" );
            }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idliste
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
       $usager_id = usager_id_user(Auth::user()->id)->id;
       $old_id = $request->id;
       
        $data = [
          
            "departement_provenance"=> $request->departement_provenance,
            "commune_provenance"=>$request->commune_provenance,
            "id_pays_destination"=>$request->pays_destination,

            "reference_conteneur"=>$request->reference_conteneur,
            "reference_plomb"=>$request->reference_plomb,
            "reference_transporteur"=>$request->reference_transporteur,
            "nom_conducteur"=>$request->nom_conducteur,
            "departement_empotage"=>$request->departement_empotage,
            "commune_empotage"=>$request->commune_empotage,
            "localite_empotage"=>$request->localite_empotage,
            "localite_empotage"=>$request->localite_empotage,
            "id_poste_forestier"=>$request->poste,
            "reference_document_provenance"=>$request->reference_document_provenance,
            "date_depart"=>$request->date_departs,
        ];

       // dd($data);
        ProcedureExportation::where('id',$old_id)->update($data);   
        $process = $old_id;  
        CaracteristiqueProduitProcedureExportation::where('id_procedure_exportation', $process)->delete();
         $nbr1= $request->len1;
         $nbr2 = $request->len2;
         $nbr3 = $request->len3;
         $nbr4 = $request->len4;
         $volume_total = 0;
         $volume_total += carateristique_save($request, $nbr1, 1, $process);
         $volume_total += carateristique_save($request, $nbr2, 2, $process);
         $volume_total += carateristique_save($request, $nbr3, 3, $process);
         $volume_total += carateristique_save($request, $nbr4, 4, $process);
        ProcedureExportation::where('id',  $process)->update(['volume_total' =>  $volume_total]);
        notificationMiseAJourProcedure($process);
        return redirect('process/toute')->with('success', "Procédure d'exportation mise à jour avec succès");
       
    }

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
