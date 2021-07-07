<?php 
namespace App\Http\Controllers\Etat_versement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProcedureExportation;
use App\Models\LaissezPasser;
use App\Models\CaracteristiqueProduitProcedureExportation;
use App\Models\Parametre;
use App\Models\RejetProcedureExportation;
use App\Models\EtatVersement;
use \Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;

class EtatversementController extends Controller
{

    public $modelEtatVersement = null;
    public $modelCaracProdExportation = null;
    public $modelProcedureExport = null;
    public $modelLaissezpasser = null;
    protected $home =null; 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){

        $this->modelEtatVersement = new EtatVersement();
        $this->modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();
        $this->modelProcedureExport = new ProcedureExportation();
        $this->modelLaissezpasser = new LaissezPasser();
        $this->home = new HomeController();


    }


  public function index()
    {
        //
    }

    public function liste_etat_delivres(){
      session(['back' => Route('liste_versement.delivres')]);

       $etat_delivres = $this->modelEtatVersement->get_etat_versements_all_info(forestier_user_id(Auth::user()->id)->id_poste);
        return view('/etat_versement/liste_etat_verse_delivres', compact('etat_delivres'));
    
    }


    public function liste_etat_en_attente(){
      session(['back' => Route('liste_versement.attente')]);

        $etat_attentes = $this->modelProcedureExport->get_procedure_exportation_all_info_by_statut_for_poste(4,forestier_user_id(Auth::user()->id)->id_poste);

        return view('/etat_versement/liste_etat_verse_attente', compact('etat_attentes'));
    
    }

    public function show_details_etat_delivre($id){

        $etat_vers = EtatVersement::where('id',$id)->first();

        $procedureEnAttentesDetails = $this->modelProcedureExport->get_procedure_exportation_all_info_by_id_for_poste($etat_vers->id_procedure_exportation, forestier_user_id(Auth::user()->id)->id_poste)->first();


        if($procedureEnAttentesDetails != null){
            $caracteristiques = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($etat_vers->id_procedure_exportation);
        
            return view('etat_versement/details_etat_versement', compact('procedureEnAttentesDetails', 'caracteristiques'));
        
    }else{

        return redirect(route('liste_versement.delivres'))->with('error', "L'état de versement auquel vous essayez d'accéder n'existe pas");

    }

    }

    public function show_detail_avant_delivrance($id){

        $procedureEnAttentesDetails = $this->modelProcedureExport->get_procedure_exportation_all_info_by_id_for_poste($id, forestier_user_id(Auth::user()->id)->id_poste)->first();

        if($procedureEnAttentesDetails != null){
            $caracteristiques = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);

            return view('etat_versement/detail_delivrance', compact('procedureEnAttentesDetails','caracteristiques'));
        }else{
            return redirect(route('liste_versement.delivres'))->with('error', "L'état de versement auquel vous essayez d'accéder n'existe pas");
        }

    }

    public function store_procedure_en_attente_etat(Request $request){

        $last_id = EtatVersement::max('id');
         $caracteristiques = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($request->id_pro);

             
             $mt_total = carateristique_update($request, $caracteristiques);
          
            if($mt_total > 0){

                 $data = [
                "numero" => process_code_DRAF($last_id + 1,date('Y')),
                "id_procedure_exportation" => $request->id_pro,
                "montant_total" => $mt_total,
                "id_agent_traitant" => forestier_user_id(Auth::user()->id)->id,
                "date_versement" => date('Y-m-d H:i:s'),
                "date_reglement" => date('Y-m-d H:i:s'),
                "observation" => $request->observation

                 ];

                 $response = EtatVersement::create($data);

                 if($response){
                  ProcedureExportation::where('id',$request->id_pro)->update(array('id_statut'=>5));
                  
                   $pdfControler = new PDFController();
                 $pdfControler->generateET($response->id,$caracteristiques);
                  notificationObtentionET($request->id_pro);
                  
                 return redirect(route('liste_versement.delivres'))->with('success', "Etat de versement délivré avec succès");
                 }
  
            }else{
                return redirect(route('liste_versement.attente'))->with('warning', "Veuillez contacter l'administrateur pour mettre à jour les prix des produits avant de délivrer l'état de versement");
            }
           
          
        }


        public function show_det_en_attente($id){
            if(user_web()->forestier){
                    $procedureEnAttentesDetails = $this->modelProcedureExport->get_procedure_exportation_all_info_by_id_for_poste($id, forestier_user_id(Auth::user()->id)->id_poste)->first();

                if($procedureEnAttentesDetails != null){
                    $caracteristiques = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);

                    return view('etat_versement/details_en_attente', compact('procedureEnAttentesDetails','caracteristiques'));
                }else{
                    return redirect(route('liste_versement.delivres'))->with('error', "L'état de versement auquel vous essayez d'accéder n'existe pas");
                }
            }else{
                 return redirect('/home')->with('warning', "Vous n'etes pas éligible à éffectuer cette action !");
            }
            
        }



 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function show_etat_delivre($id){
        
        
        return view('/etat_versement/details_etat_versement');
      
    }

    public function etat_non_regle(){
         $data = [];
          $id_usager = usager_id_user(Auth::user()->id);
        $modelEtatVersement = new EtatVersement();
        $data['etat'] = $modelEtatVersement->get_etat_versement_regle_all_info_by_user($id_usager->id);
        //etat_user_info();
        return view('/etat_versement/etat_versement_regle', $data);
    }

    public function show_etat_versement($id=false){
        $data = [];
        $id_usager = usager_id_user(Auth::user()->id);
        $modelEtatVersement = new EtatVersement();
        $data['etat'] = $modelEtatVersement->get_etat_versement_all_info_by_user($id_usager->id) ;
        return view('/etat_versement/etat_versement_non_regle', $data);
      
    }


   /* public function show_etat_versement($id=false){
          $data = [];
          $id_usager = usager_id_user(Auth::user()->id);
          $modelEtatVersement = new EtatVersement();
          $data['etat'] = $modelEtatVersement->get_etat_versement_all_info_by_user($id_usager->id) ;
        return view('/etat_versement/etat_versement_non_regle', $data);
      
    }*/


    public function regle_etat_versement($id=false){
        
        $data = [];
    

            //$process = new ProcedureExportation(); 
            $id_usager = usager_id_user(Auth::user()->id);
            $modelEtatVersement = new EtatVersement();
            if($id>0){
                 $data['process'] = $modelEtatVersement->get_etat_versement_all_info_by_id_for_user($id,$id_usager->id); 
                    
                  // dd( ProcedureExportation::where('id',$id)->get());
                 //dd( $data['process'] );
                    if($data['process']!= null && count($data['process']) >0 )
                    {    
                        $data['process'] = $data['process'][0];
                        $carateristique = new CaracteristiqueProduitProcedureExportation();
                        $data['caracteristique'] =  $carateristique->get_caracteristique_procedure_exportation_by_id($data['process']->id_procedure_exportation);
                        if( count($data['caracteristique']) <= 0)
                             $data['no_data_found'] = "Aucun produit ajouté à cette procédure"; 
                        return view('/vue_etat_versement', $data);            
                    }else{
                        return redirect('/etat_versement_non_regle')->with('error', "L'état de versement auquel vous essayez d'acceder n'existe pas !" );
                    }
            }else{
                return redirect('/regle_etat_versement')->with('error', "Accès non autorisé!" );
            }
           
      
    }

     public function save_regle(Request $request)
    {
        
       $old_id = $request->id;
       $id_usager = usager_id_user(Auth::user()->id);
            $modelEtatVersement = new EtatVersement();
            $process = $modelEtatVersement->get_etat_versement_all_info_by_id_for_user($old_id,$id_usager->id); 

        if ($request->quittance->isValid())
        {
            $full_name = Auth::user()->firstname."_".Auth::user()->name;
            $file_path = "public/quittance/".date('Y')."/".Auth::user()->firstname."_".Auth::user()->name."/";
            $file_path = perform_links($file_path);
            $pdf_name = perform_links2(perform_links($process[0]->numero."_".$full_name));
            $file_extension=  $request->quittance->getClientOriginalExtension();
            $request->quittance->storeAs($file_path,$pdf_name.'.'.$file_extension);

             //Procedure

             ProcedureExportation::where('id',  $process[0]->id_procedure_exportation)->update(['id_statut' =>  6]);
           // notificationReglementEtatVersement($old_id);
            return redirect('/etat_versement_regle')->with('success', "Quittance enregistré avec succès !");
           
        }else{
            return redirect('/etat_versement_non_regle')->with('info', "Aucun document n'a été soumis, veuillez réessayer!");
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
    public function update(Request $request, $id)
    {
        //
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
