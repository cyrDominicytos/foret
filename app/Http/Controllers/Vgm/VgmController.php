<?php

namespace App\Http\Controllers\Vgm;


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
use App\Models\Vgm;
use App\Models\Intervenant;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;


class VgmController extends Controller
{

    protected $data = []; 
    protected $ProcedureExportation =null; 
    protected $modelCaracProdExportation = null;
    protected $modelVgm = null;
    protected $request =null; 
    protected $home =null; 
    public function __construct()
    {
        $this->ProcedureExportation = new ProcedureExportation();
         $this->modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();
         $this->modelVgm = new Vgm();
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

     public function scan_form($process=false)
    {
        $data = [];
        $data['pays'] =     Pay::all();
        $data['departement'] =     Departement::all();
        $data['commune'] =  Commune::all();
        $data['poste'] =  Poste::all();
        $data['produit'] =  TypeProduit::where('categorie',1)->get();
        $data['essence'] =  EspeceProduit::all();
        $data['usager'] =  Usager::firstWhere('id_user', Auth::user()->id);

        if(!usager_makes_demande(usager_id_user(Auth::user()->id) ? (usager_id_user(Auth::user()->id)->id) : (null), date('Y')))
                 return redirect('demandes/toute')->with('error', "Vous n'avez pas encore éffectué votre demande annuelle au titre de l'année ".date('Y').". Cliquez sur le bouton Nouvelle demande pour l'éffectuer.");
        
        
        if($process != false)
        {
            $data['process'] = ProcedureExportation::firstWhere('id', $process); 
            if($data['process']!= null)
            {    
                $data['process'] = $data['process']->get()[0];
                $carateristique = new CaracteristiqueProduitProcedureExportation();

                $data['caracteristique1'] =  $carateristique->get_caracteristique_procedure_exportation_by_id_and_categorie($process, 1); 
                
                $data['caracteristique2'] =  $carateristique->get_caracteristique_procedure_exportation_by_id_and_categorie($process, 2);
                 $data['caracteristique3'] =  $carateristique->get_caracteristique_procedure_exportation_by_id_and_categorie($process, 3); 
                 $data['caracteristique4'] =  $carateristique->get_caracteristique_procedure_exportation_by_id_and_categorie($process, 4);
                         $data['nbrcat1'] =  count( $data['caracteristique1']);
                         $data['nbrcat2'] =  count( $data['caracteristique2']);
                         $data['nbrcat3'] =  count( $data['caracteristique3']);
                         $data['nbrcat4'] =  count( $data['caracteristique4']);      
                    $data['vue'] = 1;
                 
            }else{
              
                return redirect('process/toute')->with('error', "La procedure à laquelle vous essayez d'acceder n'existe pas !" );
            }

        }
         
       //($this->ProcedureExportation->get_procedure_exportation_all_info_by_id(1));
        return view('/nouvelle_procedure', $data);
    }

    public function liste($details)
    {
         session(['back' => Route('vgm', ['details' => in_array($details,array("attente", "delivre")) ? ($details) : ('attente')])]);

         $data = [];
         $data['details']  = $details;
        switch ($details) {
            case 'attente':
                $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_vgm_attente();
                break;
                case 'delivre':
                $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_vgm_obtenue();

                break;

            default:
               $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_vgm_attente();
                break;
        }

        return view('/liste_procedure_vgm', $data);
    }

    public function joindre_vgm($id){

         $procedureEnAttentesDetails = $this->ProcedureExportation
->get_procedure_exportation_all_info_by_id($id)->first();

         $attente = 1;

        if($procedureEnAttentesDetails!=null)
        {
            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);
            $gradeAgent = Intervenant::where('id_user',Auth::user()->id)->first();
            if ($gradeAgent==null) 
                return redirect('/home')->with('warning', "Vous n'etes pas éligible à éffectuer cette action !");
            return view('/joindre_vgm', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent'));
        }
        else
        {
            return redirect('/vgm/attente')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas !" );
        }

    }




public function save_vgm(Request $request)
        {
                
                $old_id = $request->id;
                $process = $this->ProcedureExportation->get_procedure_exportation_all_info_by_id($old_id)->first();
                if($process){
                    if ($request->vgm!= null && $request->vgm->isValid())
                    {
                       
                        $full_name = $process->prenom_user."_".$process->nom_user;
                        $file_path = "public/vgm/".date('Y')."/".$full_name."/";
                        $file_path2 = "vgm/".date('Y')."/".$full_name."/";
                        $file_path = perform_links($file_path);
                        $file_extension= $request->vgm->getClientOriginalExtension();
                        $pdf_name = perform_links2(perform_links('vgm_'.$process->numero."_".$full_name)).'.'.$file_extension;
                        $request->vgm->storeAs($file_path,$pdf_name);

                        //Procedure
                        $data = [
                                    'id_procedure_exportation' => $old_id,
                                    'autorite' => intervenant_user_id(Auth::user()->id)->id,
                                    'observation' => $request->observation,
                        ];
                        $vgm = Vgm::create($data);
                        $doc = new Document();
                        $doc->nom_fichier =$pdf_name;
                        $doc->nom_entite = 'vgms';
                        $doc->entite_id = $old_id;
                        $doc->chemin = $file_path2;
                        $doc->id_categorie_document = 16;
                        $doc->save();
                        notificationVGMJointes($vgm->id);
                        return redirect('/vgm/delivre')->with('success', "La fiche VGM a été enregistrée avec succès !");

                    }else{
                         return redirect('/vgm/attente')->with('error', "Le fichier VGM joint n'a pas été bien transmis, veuillez réessayer !");
                    }
                }else{
                    return redirect('/vgm/attente')->with('warning', "Action non autorisé !");
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
     * @param  int  $id
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
