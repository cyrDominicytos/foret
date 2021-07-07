<?php

namespace App\Http\Controllers\Laissez_passer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProcedureExportation;
use App\Models\LaissezPasser;
use App\Models\CaracteristiqueProduitProcedureExportation;
use App\Models\Parametre;
use App\Models\RejetProcedureExportation;
use \Auth;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;


class LaissezpasserController extends Controller
{
    public $modelProcedureExportation = null;
    public $modelCaracProdExportation = null;
    public $modelLaissezpasser = null;
    public $modelParametre = null;
    public $modelDemandeRejet = null;
    protected $home =null; 

    function __construct(){

        $this->modelProcedureExportation = new ProcedureExportation();
        $this->modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();
        $this->modelLaissezpasser = new LaissezPasser();
        $this->modelParametre = new Parametre();
        $this->modelDemandeRejet = new RejetProcedureExportation();
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

    public function liste_en_attente(){
        session(['back' => Route('liste.en_attente')]);

        $procedureEnAttentes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(2, forestier_user_id(Auth::user()->id)->id_poste);

       return view('/liste_laissez_passer_en_attente', compact('procedureEnAttentes'));
    }

    public function show_en_attente($id){

       
         $procedureEnAttentesDetails = $this->modelLaissezpasser->get_laissez_passers_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();


        if($procedureEnAttentesDetails == null){

             $procedureEnAttentesDetails = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

             if($procedureEnAttentesDetails != null){
            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);

                 $delaiValidite = Parametre::where('code','délai_laissez_passer')->first();

                return view('/details_emission', compact('procedureEnAttentesDetails', 'caracProdExportations', 'delaiValidite'));
        
              }else{
                return redirect(route('liste.en_attente'))->with('error', "La demande à laquelle vous essayez d'éccéder n'existe pas");
              }           

        }else{

             $lp = 1;
             $id_lp = LaissezPasser::where('id',$id)->first();
           
            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id_lp->id_procedure_exportation);
            $delaiValidite = Parametre::where('code','délai_laissez_passer')->first();

            return view('/details_emission', compact('procedureEnAttentesDetails', 'caracProdExportations','delaiValidite', 'lp'));

            
        
    }
        
 }

    public function show_details_en_attente($id){

        $procedureEnAttentesDetails = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();
          
        if($procedureEnAttentesDetails != null){
            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);

        return view('/details_lp_attente', compact('procedureEnAttentesDetails', 'caracProdExportations'));
        
    }else{

        return redirect(route('liste.en_attente'))->with('error', "La demande à laquelle vous essayez d'accéder n'existe pas");

    }

        
    }

    public function liste_delivres(){
         session(['back' => Route('liste.delivres')]);

        $passDelivres = $this->modelLaissezpasser->get_laissez_passers_all_info(forestier_user_id(Auth::user()->id)->id_poste);
        return view('/liste_laissez_passer_delivres', compact('passDelivres'));
    
    }

    public function store_procedure_en_attente(Request $request){

        $last_id = LaissezPasser::max('id');
        $raison = $request->reasonReject;

        if($raison == null){
                $data = [
                "numero" => process_code_CIF($last_id + 1),
                "id_procedure_exportation" => (int)$request->id_p,
                "debut_validite" => $request->start_validity,
                "fin_validite" => $request->end_validity,
                "fin_validite_etendue" => date('Y-m-d'),
                "id_agent_emission" => forestier_user_id(Auth::user()->id)->id,
                "id_agent_extension" => forestier_user_id(Auth::user()->id)->id,
                "observation" => "",
                "date_laissez_passer" => date('Y-m-d H:i:s')
            ];
         
            $response = LaissezPasser::create($data);
            if($response){
            
                $last_id = LaissezPasser::max('id');
                ProcedureExportation::where('id',(int)$request->id_p)->update(array('id_statut'=>3));
                $laissez_passer_id = LaissezPasser::where('id_procedure_exportation',(int)$request->id_p)->first()->id;
                $pdfControler = new PDFController();
                $pdfControler->generateLP($laissez_passer_id);
                notificationDemandeLP((int)$request->id_p);
            
                return redirect(route('liste.delivres'))->with('success', "Laissez-passer délivré avec succès");
                
             }

        }else{
            $data = [
                "id_procedure_exportation" => (int)$request->id_p,
                "id_statut_avant_rejet" => 2,
                "id_statut_apres_rejet" => 1003,
                "id_agent_traitant" => Auth::user()->id,
                "raison_rejet" => $raison,
                "date_rejet" => date('Y-m-d H:i:s')

            ];
          
            $response = RejetProcedureExportation::create($data);

            if($response){
                $last_id = LaissezPasser::max('id');
                ProcedureExportation::where('id',(int)$request->id_p)->update(array('id_statut'=>1003));
                notificationRejetLP((int)$request->id_p);
                return redirect(route('liste.rejets'))->with('success', "Demande de laissez-passer rejetée avec succès");
            }
        }

    }

    public function show_delivre($id){

        $laiss_id = LaissezPasser::where('id',$id)->first();

        $detailsLaissezPassers = $this->modelLaissezpasser->get_laissez_passers_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        $procedureEnAttentesDetails = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_id_for_poste($laiss_id->id_procedure_exportation,forestier_user_id(Auth::user()->id)->id_poste)->first();
      
        return view('/details_laissez_passer', compact('detailsLaissezPassers', 'procedureEnAttentesDetails'));
      
    }

  
    public function liste_demande_rejet(){
        session(['back' => Route('liste.rejets')]);

            $detailsDemandeRejets = $this->modelDemandeRejet->get_procedure_rejeter_statut_apres_for_poste(1003,forestier_user_id(Auth::user()->id)->id_poste);
          
            return view('/liste_demandes_rejet', compact('detailsDemandeRejets'));
           
        }

    public function show_demande_rejet($id){

        $id_procedure_for_rejet = RejetProcedureExportation::where('id',$id)->first();
        if($id_procedure_for_rejet)
            $id_procedure_for_rejet = $id_procedure_for_rejet->id_procedure_exportation;
         $procedureEnAttentesDetails = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_id_for_poste($id_procedure_for_rejet,forestier_user_id(Auth::user()->id)->id_poste)->first();

        if($procedureEnAttentesDetails != null){

             $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);

            $delaiValidite = Parametre::where('code','délai_laissez_passer')->first();

            $rejetInfos = $this->modelDemandeRejet->get_procedure_rejeter_by_id_for_poste($id_procedure_for_rejet,forestier_user_id(Auth::user()->id)->id_poste)->first();
          
            user_forestier_id($rejetInfos->id_agent_traitant);
           
              return view('/details_demandes_rejet', compact('procedureEnAttentesDetails', 'caracProdExportations', 'delaiValidite', 'rejetInfos'));
        }else{

            return redirect(route('liste.rejets'))->with('error', "La demande à laquelle vous essayez d'accéder n'existe pas");            

        }


       
    }

  
    public function liste_a_etendre(){
        session(['back' => Route('liste.etendre')]);


        $extends = $this->modelLaissezpasser->get_laissez_passers_to_extend_by_id_for_poste(forestier_user_id(Auth::user()->id)->id_poste);
        
        return view('/liste_laissez_passer_a_etendre', compact('extends'));
    }

    public function update_fin_validite(Request $req){

        $id_validity = $req->id_to_upd;
         $id_proced = LaissezPasser::where('id',$id_validity)->first()->id_procedure_exportation;
        $laissezAEtendre = LaissezPasser::where('id',$id_validity)->update(array('fin_validite_etendue'=>$req->end_validity, 'id_agent_extension' => forestier_user_id(Auth::user()->id)->id));
            notificationExtensionLP($id_proced);
    
        return redirect(route('liste.delivres'))->with('success', "Date de fin de validité étendue avec succès");
                
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
