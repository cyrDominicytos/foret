<?php

namespace App\Http\Controllers\Contre_constat;


use App\Http\Controllers\Controller;
use App\Http\Controllers\PDFController;

use Illuminate\Http\Request;
use App\Models\ProcedureExportation;
use App\Models\ConstatConformite;
use App\Models\ContreConstat;
use App\Models\CaracteristiqueProduitProcedureExportation;
use App\Models\Parametre;
use App\Models\LaissezPasser;
use App\Models\Forestier;
use App\Models\RejetProcedureExportation;
use \Auth;
use App\Http\Controllers\HomeController;

// use App\Http\Requests\LaisspassCreateFormRequest;


class ContreconstatController extends Controller
{
    public $modelProcedureExportation = null;
    public $modelCaracProdExportation = null;
    public $modelConstatConformite = null;
    public $modelContreConstat = null;
    public $modelParametre = null;
    public $modelLaissezpasser = null;
    public $modelForestier = null;
    public $modelRejetProcedureExportation = null;
    protected $home =null; 

    function __construct(){

        $this->modelProcedureExportation = new ProcedureExportation();
        $this->modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();
        $this->modelConstatConformite = new ConstatConformite();
        $this->modelContreConstat = new ContreConstat();
        $this->modelParametre = new Parametre();
        $this->modelLaissezpasser = new LaissezPasser();
        $this->modelForestier = new Forestier();
        $this->modelRejetProcedureExportation = new RejetProcedureExportation();
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

    public function dashboard(){
       
        $contreConstatDelivres = ConstatConformite::all();

        $procedureEnAttentes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(1,forestier_user_id(Auth::user()->id)->id_poste);

        $procedureRejetes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(2,forestier_user_id(Auth::user()->id)->id_poste);

        return view('/home', compact('contreConstatDelivres', 'procedureEnAttentes', 'procedureRejetes'));
    }

    public function liste_en_attente_contre_constat(){
        session(['back' => Route('liste.en_attente_contre_constat')]);

        $procedureEnAttentes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(3,forestier_user_id(Auth::user()->id)->id_poste);
        
       return view('/contre_constat/liste_contre_constat_en_attente', compact('procedureEnAttentes'));
    }

    
    public function liste_rejete_contre_constat(){
       session(['back' => Route('liste.contre_constat_rejete')]);

       $procedureRejetes = $this->modelRejetProcedureExportation->get_procedure_rejeter_statut_apres_for_poste(1004,forestier_user_id(Auth::user()->id)->id_poste);


          
       return view('/contre_constat/liste_contre_constat_rejete', compact('procedureRejetes'));
        
    }

    public function liste_delivres_contre_constat(){
        session(['back' => Route('liste.delivres_contre_constat')]);

        $contreConstatDelivres = $this->modelContreConstat->get_contre_constats_all_info(forestier_user_id(Auth::user()->id)->id_poste);
        return view('/contre_constat/liste_contre_constat_delivres', compact('contreConstatDelivres'));
        
    }

    public function store_procedure_en_attente_contre_constat(Request $request){

        $last_id = ContreConstat::max('id');

        $id_agent = Forestier::where('id_user',Auth::user()->id)->first();

        $observation = $request->observation;

        if (!empty(trim($request->observation)) || !is_null(trim($request->observation))) 
        {   
            if ($request->conforme==0) 
                { 
            
                $observation = "Les informations sont non conformes aux informations du constat de conformité.\n ".trim($request->observation);
                }
            
            else 
                {
           
                $observation = trim($request->observation);
                }
               
        }
        else
        {
            if ($request->conforme==0) 
                { 
            
                $observation = "Les informations sont non conformes aux informations du constat de conformité.\n ";
                }
            
            else 
                {
           
                $observation = "";
                }
        }

        if ($id_agent==null) {

            return redirect(route('liste.delivres_contre_constat'))->with('error', "Vous n'avez pas l'autorisation requise pour effectuer cette action");

        }

    if ($request->conforme==1) 
    {

           $data = [
            "numero"=>$request->num_contre_constat,
            "id_procedure_exportation"=>(int)$request->id_p,
            "conformite_au_constat_conformite"=>$request->conforme,
            "id_agent_traitant"=>$id_agent->id,
            "observation"=>$observation,
            "date_contre_constat"=>\Carbon\Carbon::now()
        ];
            $response = ContreConstat::create($data);
            if($response)
            {
                ProcedureExportation::where('id',(int)$request->id_p)->update(array('id_statut'=>4));
                $id_contre_constat = $response->id;

                $pdfControler = new PDFController();
                $pdfControler->generateContreConstat($id_contre_constat);

                notificationContreConstatObtenu((int)$request->id_p);
            
                return redirect(route('liste.delivres_contre_constat'))->with('success', "Contre Constat de conformité émise avec succès");
            }
            else
            {
                return redirect(route('liste.delivres_contre_constat'))->with('error', "Echec d'enregistrement. Veuillez réessayer");
            }

    }
    elseif ($request->conforme==0) {
       
       $data = [
            "id_procedure_exportation"=>(int)$request->id_p,
            "id_statut_avant_rejet"=>3,
            "id_statut_apres_rejet"=>1004,
            "id_agent_traitant"=>$id_agent->id,
            "raison_rejet"=>$observation,
            "date_rejet"=>\Carbon\Carbon::now(),
        ];
            
        $response = RejetProcedureExportation::create($data);
         
        if ($response) {
                ProcedureExportation::where('id',(int)$request->id_p)->update(array('id_statut'=>1004));
        notificationRejetContreConstat((int)$request->id_p);
            
        return redirect(route('liste.contre_constat_rejete'))->with('success', "Contre Constat de conformité rejeté avec succès");
            } 

        else{

            return redirect(route('liste.contre_constat_rejete'))->with('error', "Echec du rejet du contre constat. Veuillez réessayer");
        } 
       
    }
    
            
        return redirect(route('liste.contre_constat_rejete'))->with('error', "Action non autorisée");


    }

    public function show_en_attente_contre_constat($id){

        $constatConformite  = ConstatConformite::where('id_procedure_exportation',$id)->first();

         if( $constatConformite ==null)
         {
            return redirect('/contre_constat/attente')->with('error', "Cette procédure ne possède pas encore un constat de conformité. Veuillez contacter l'administrateur du système" );
         }

        $procedureEnAttentesDetails = $this->modelConstatConformite->get_constat_conformites_all_info_by_id_for_poste($constatConformite ->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        if( $procedureEnAttentesDetails!=null){

            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id); 

             $laisser_passer = LaissezPasser::where('id_procedure_exportation',$id)->first();

        if ($laisser_passer==null) {

            return redirect('/contre_constat/attente')->with('error', "Cette procédure ne possède pas encore un Laissez-passer. Veuillez contacter l'administrateur du système" );
           
        }

        $detailsLaissezPassers = $this->modelLaissezpasser->get_laissez_passers_all_info_by_id_for_poste($laisser_passer->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

            $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

            if ($gradeAgent==null) 
            {

            return redirect('/contre_constat/attente')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
            }

            // $constatConformite = ConstatConformite::where('id_procedure_exportation',$id)->first();

            // if ($constatConformite==null) 
            // {

            // return redirect('/contre_constat/attente')->with('error', "Cette procédure ne possède pas encore un constat de conformité. Veuillez contacter l'administrateur du système" );
            // }
               
             
            return view('/contre_constat/details_contre_constat_attente', compact('procedureEnAttentesDetails', 'caracProdExportations','detailsLaissezPassers','gradeAgent'));

        }
        else{
             return redirect('/contre_constat/attente')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );
        }
       
    }

    public function show_en_attente_contre_constat_traiter($id){

    
        $constatConformite = ConstatConformite::where('id_procedure_exportation',$id)->first();

        if ($constatConformite==null) {

            return redirect('/contre_constat/attente')->with('error', "Cette procédure ne possède pas encore un constat de conformité. Veuillez contacter l'administrateur du système" );
           
        }

       $procedureEnAttentesDetails = $this->modelConstatConformite->get_constat_conformites_all_info_by_id_for_poste($constatConformite->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        if( $procedureEnAttentesDetails!=null)
        {

        $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);  

        $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

        $laisser_passer = LaissezPasser::where('id_procedure_exportation',$id)->first();

        if ($laisser_passer==null) {

            return redirect('/contre_constat/attente')->with('error', "Cette procédure ne possède pas encore un Laissez-passer. Veuillez contacter l'administrateur du système" );
           
        }

        $detailsLaissezPassers = $this->modelLaissezpasser->get_laissez_passers_all_info_by_id_for_poste($laisser_passer->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

            if ($gradeAgent==null) 
            {

            return redirect('/contre_constat/attente')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
            }

            // $constatConformite = ConstatConformite::where('id_procedure_exportation',$procedureEnAttentesDetails->id)->first();

            // if ($constatConformite==null) 
            // {

            // return redirect('/contre_constat/attente')->with('error', "Cette procédure ne possède pas encore un constat de conformité. Veuillez contacter l'administrateur du système" );
            // }

       
        return view('/contre_constat/traiter_contre_constat_attente', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent','detailsLaissezPassers'));
    }
    else{
            return redirect('/contre_constat/attente')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );
    }

    }

    public function show_contre_constat_rejete($id){
       $procedureEnAttentesDetails = $this->modelRejetProcedureExportation->get_procedure_rejeter_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();


        if( $procedureEnAttentesDetails!=null)
        {

             $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

            if ($gradeAgent==null) 
            {

            return redirect('/contre_constat/attente')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
            }

        $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($procedureEnAttentesDetails->id_procedure_exportation);

         $laisser_passer = LaissezPasser::where('id_procedure_exportation',$procedureEnAttentesDetails->id_procedure_exportation)->first();

        if ($laisser_passer==null) {

            return redirect('/contre_constat/attente')->with('error', "Cette procédure ne possède pas encore un Laissez-passer. Veuillez contacter l'administrateur du système" );
           
        }

        $detailsLaissezPassers = $this->modelLaissezpasser->get_laissez_passers_all_info_by_id_for_poste($laisser_passer->id,forestier_user_id(Auth::user()->id)->id_poste)->first(); 

        // $rejetProcedureExportation = RejetProcedureExportation::where('id_procedure_exportation',$id)->first();

        $constatConformite = ConstatConformite::where('id_procedure_exportation',$procedureEnAttentesDetails->id_procedure_exportation)->first();

        if ($constatConformite==null) 
        {

            return redirect('/contre_constat/attente')->with('error', "Cette procédure ne possède pas encore un constat de conformité. Veuillez contacter l'administrateur du système" );
        }

        // $contreConstat = ContreConstat::where('id_procedure_exportation',$id)->first();

        
        return view('/contre_constat/details_contre_constat_rejete', compact('procedureEnAttentesDetails', 'caracProdExportations','detailsLaissezPassers','constatConformite','gradeAgent','rejetProcedureExportation'));
    }
    else
    {
        return redirect('/contre_constat/rejete')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );

    }

    }



    public function show_delivre_contre_constat($id){
        $procedureEnAttentesDetails = $this->modelContreConstat->get_contre_constats_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        // $contreConstat = ContreConstat::where('id',$id)->first();
        // if ($contreConstat==null) {

        //     return redirect('/contre_constat/details_contre_constat_delivre')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
        // }

        if( $procedureEnAttentesDetails!=null)
        {

         $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

            if ($gradeAgent==null) 
            {

            return redirect('/contre_constat/attente')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
            }

            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($procedureEnAttentesDetails->id_procedure_exportation); 

            $laisser_passer = LaissezPasser::where('id_procedure_exportation',$procedureEnAttentesDetails->id_procedure_exportation)->first();

        if ($laisser_passer==null) {

            return redirect('/contre_constat/attente')->with('error', "Cette procédure ne possède pas encore un Laissez-passer. Veuillez contacter l'administrateur du système" );
           
        }

        $detailsLaissezPassers = $this->modelLaissezpasser->get_laissez_passers_all_info_by_id_for_poste($laisser_passer->id,forestier_user_id(Auth::user()->id)->id_poste)->first();


            $constatConformite = ConstatConformite::where('id_procedure_exportation',$procedureEnAttentesDetails->id_procedure_exportation)->first();

            if ($constatConformite==null) 
            {

            return redirect('/contre_constat/details_contre_constat_delivre')->with('error', "Cette procédure ne possède pas encore un constat de conformité. Veuillez contacter l'administrateur du système" );
            }

      // $contreConstat = ContreConstat::where('id_procedure_exportation',$id)->get()[0];

        return view('/contre_constat/details_contre_constat_delivre', compact('procedureEnAttentesDetails', 'caracProdExportations','detailsLaissezPassers','constatConformite','gradeAgent'));
        }
        else
        {
            return redirect('/contre_constat/delivres')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );
        }

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
