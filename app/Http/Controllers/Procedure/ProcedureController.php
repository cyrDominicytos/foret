<?php

namespace App\Http\Controllers\Procedure;


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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Http\Controllers\HomeController;

class ProcedureController extends Controller
{

    protected $data = []; 
    protected $ProcedureExportation =null; 
    protected $request =null; 
    protected $home =null; 

    public function __construct()
    {
        $this->ProcedureExportation = new ProcedureExportation();
        $this->request = new Request();
        $this->home = new HomeController();

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


        $usager_id = usager_id_user(Auth::user()->id)->id;

        $data = [
            "numero"=>process_code(next_num_process($request->departement_empotage)+1,$request->departement_empotage),
            "id_demande_annuelle"=>DemandeAnnuelle::where('id_usager',$usager_id)->where('demande_pour_annee', date('Y'))->first()->id,
            "id_usager"=>$usager_id,
            
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
            "telephone_conducteur"=>$request->telephone_conducteur,

            "id_statut"=>1,
            "volume_total"=>0,
            "observation"=>"",
        ];

     
        $reponse = ProcedureExportation::create($data);
        $process = ProcedureExportation::max('id');  
           
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

        if($request->document_reference != null && $request->document_reference->isValid())
            {
                $full_name = Auth::user()->firstname."_".Auth::user()->name;
                $file_path = "public/document_reference/".date('Y')."/".Auth::user()->firstname."_".Auth::user()->name."/";
                $file_path2 = "document_reference/".date('Y')."/".Auth::user()->firstname."_".Auth::user()->name."/";
                $file_path = perform_links($file_path);
                $file_path2 = perform_links($file_path2);
                $file_extension= $request->document_reference->getClientOriginalExtension();
                $pdf_name = perform_links2(perform_links('document_reference_'.$reponse->numero."_".$full_name)).'.'.$file_extension;
                $request->document_reference->storeAs($file_path,$pdf_name);

             save_file_in_doc($pdf_name, $file_path2, $reponse->id,'procedures', 2);
             notificationCreationProcedure($process);
             return redirect('process/toute')->with('success', "Procédure d'exportation créée avec succès");

        }else{
            notificationCreationProcedure($process);
            return redirect('process/toute')->with('warning', "Procédure d'exportation créée avec succès ! Veuillez ajouter le document de référence");
        }
        
    }

    public function nouvelle_procedure($process=false)
    {
        $data = [];
        $data['pays'] =     Pay::orderBy('titre', 'ASC')->get();
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
               // $data['process'] = $data['process']->get()[0];
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
    session(['back' => Route('process', ['details' => in_array($details,array("toute", "traitement", "fermees", "rejetees")) ? ($details) : ('toute')])]);


        $data = [];
         $data['details']  = $details;

          $id_usager = usager_id_user(Auth::user()->id) ? (usager_id_user(Auth::user()->id)) : Auth::user()->id;
        if(user_web()->intervenant){
                    switch ($details) {
                    case 'toute':
                        $data['procedures'] =  $this->ProcedureExportation->get_procedure_exportation_all_info();
                        break;
                        case 'traitement':
                        
                        $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_en_traitement_for_intervenant();

                        break;
                        case 'fermees':
                        $data['procedures'] =  $this->ProcedureExportation->get_procedure_exportation_all_info_fermer_for_intervenant();

                        
                        break;
                        case 'rejetees':
                        $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info_rejeter_for_intervenant();


                        break;
                    
                    default:
                       $data['procedures'] = $this->ProcedureExportation->get_procedure_exportation_all_info();
                        break;
                }

                }else{
                    switch ($details) {
                    case 'toute':
                        $data['procedures'] = user_web()->usager ? ($this->ProcedureExportation->get_procedure_exportation_all_info_by_user($id_usager->id)) : ($this->ProcedureExportation->get_procedure_exportation_all_info_sector(forestier_user_id(Auth::user()->id)->id_poste)) ;
                        break;
                        case 'traitement':
                        
                        $data['procedures'] = user_web()->usager ? ($this->ProcedureExportation->get_procedure_exportation_all_info_en_traitement($id_usager->id)) : ($this->ProcedureExportation->get_procedure_exportation_all_info_en_traitement_sector(forestier_user_id(Auth::user()->id)->id_poste)) ;

                        break;
                        case 'fermees':
                        $data['procedures'] = user_web()->usager ? ($this->ProcedureExportation->get_procedure_exportation_all_info_fermer($id_usager->id)) : ($this->ProcedureExportation->get_procedure_exportation_all_info_fermer_sector(forestier_user_id(Auth::user()->id)->id_poste)) ;

                        
                        break;
                        case 'rejetees':
                        $data['procedures'] = user_web()->usager ? ($this->ProcedureExportation->get_procedure_exportation_all_info_rejeter($id_usager->id)) : ($this->ProcedureExportation->get_procedure_exportation_all_info_rejeter_sector(forestier_user_id(Auth::user()->id)->id_poste)) ;


                        break;
                    
                    default:
                       $data['procedures'] = user_web()->usager ? ($this->ProcedureExportation->get_procedure_exportation_all_info_by_user($id_usager->id)) : ($this->ProcedureExportation->get_procedure_exportation_all_info_sector(forestier_user_id(Auth::user()->id)->id_poste)) ;
                        break;
                }

                }
       
        
        return view('/liste_procedure', $data);
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
            $data['process'] = $process->get_procedure_exportation_all_info_by_id($id)->first(); 
            
          // dd( ProcedureExportation::where('id',$id)->get());
        //  dd( $data['process'] );

            if($data['process']!= null)
            {    
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
            "telephone_conducteur"=>$request->telephone_conducteur,
            "date_depart"=>$request->date_departs,
        ];

       // dd($data);
        $reponse = ProcedureExportation::where('id',$old_id)->update($data); 
        $reponse = ProcedureExportation::firstwhere('id',$old_id);  
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

        if($request->document_reference != null && $request->document_reference->isValid())
            {
                $full_name = Auth::user()->firstname."_".Auth::user()->name;
                $file_path = "public/document_reference/".date('Y')."/".Auth::user()->firstname."_".Auth::user()->name."/";
                $file_path2 = "document_reference/".date('Y')."/".Auth::user()->firstname."_".Auth::user()->name."/";
                $file_path = perform_links($file_path);
                $file_extension= $request->document_reference->getClientOriginalExtension();
                $pdf_name = perform_links2(perform_links('document_reference_'.$reponse->numero."_".$full_name)).'.'.$file_extension;
                $request->document_reference->storeAs($file_path,$pdf_name);

               
              /*  $doc = new Document();
                $doc->nom_fichier = $pdf_name;
                $doc->nom_entite = 'procedures';
                $doc->entite_id = $reponse->id;
                $doc->chemin = $file_path2;
                $doc->id_categorie_document = 2;
                $doc->save();*/

                save_file_in_doc($pdf_name, $file_path2, $reponse->id,'procedures', 2);
              
        }
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
