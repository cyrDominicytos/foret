<?php

namespace App\Http\Controllers\Constat_conformite;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Carbon;
use App\Http\Controllers\PDFController;
use Illuminate\Http\Request;
use App\Models\ProcedureExportation;
use App\Models\ConstatConformite;
use App\Models\CaracteristiqueProduitProcedureExportation;
use App\Models\Parametre;
use App\Models\Forestier;
use App\Models\RejetProcedureExportation;
use \Auth;
use App\Http\Controllers\HomeController;

// use App\Http\Requests\LaisspassCreateFormRequest;


class ConstatconformiteController extends Controller
{
    public $modelProcedureExportation = null;
    public $modelCaracProdExportation = null;
    public $modelConstatConformite = null;
    public $modelParametre = null;
    public $modelForestier = null;
    public $modelRejetProcedureExportation = null;
    protected $home =null; 

    function __construct(){
       
        $this->modelProcedureExportation = new ProcedureExportation();
        $this->modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();
        $this->modelConstatConformite = new ConstatConformite();
        $this->modelParametre = new Parametre();
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
       
        $constatDelivres = $this->modelConstatConformite->get_constat_conformites_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        $procedureEnAttentes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(1,forestier_user_id(Auth::user()->id)->id_poste);

        $procedureRejetes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(1002,forestier_user_id(Auth::user()->id)->id_poste);


        return view('/home', compact('constatDelivres', 'procedureEnAttentes', 'procedureRejetes'));
    }

    public function liste_en_attente_constat(){
      session(['back' => Route('liste.en_attente_constat')]);

       $procedureEnAttentes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(1,forestier_user_id(Auth::user()->id)->id_poste);
          
       return view('/constat_conformite/liste_constat_conformite_en_attente', compact('procedureEnAttentes'));
    }

    
    public function liste_rejete_constat(){
     session(['back' => Route('liste.constat_rejete')]);


       $procedureRejetes = $this->modelRejetProcedureExportation->get_procedure_rejeter_statut_apres_for_poste(1002,forestier_user_id(Auth::user()->id)->id_poste);


          
       return view('/constat_conformite/liste_constat_conformite_rejete', compact('procedureRejetes'));
        
    }

    public function liste_delivres_constat(){
      session(['back' =>Route('liste.delivres_constat')]);


        $constatDelivres = $this->modelConstatConformite->get_constat_conformites_all_info(forestier_user_id(Auth::user()->id)->id_poste);
        return view('/constat_conformite/liste_constat_conformite_delivres', compact('constatDelivres'));
        
    }

    public function store_procedure_en_attente_constat(Request $request){

        
        $id_agent = Forestier::where('id_user',Auth::user()->id)->first();

        $observation = $request->observation;
        

        if ($id_agent==null) {

            return redirect(route('liste.delivres_constat'))->with('error', "Vous n'avez pas l'autorisation requise pour effectuer cette action");

        }

    if ($request->conforme1==1 && $request->conforme2==1) 
    {

           $data = [
            "numero"=>$request->num,
            "id_procedure_exportation"=>(int)$request->id_p,
            "conformite_contenu_procedure_exportation"=>$request->conforme1,
            "conformite_reglementation"=> $request->conforme2,
            "id_agent_traitant"=>$id_agent->id,
            "observation"=>$request->observation,
            "date_constat"=> \Carbon\Carbon::now()
        ];
            $response = ConstatConformite::create($data);
            
            if($response)
            {
                $id_constat = $response->id;
                ProcedureExportation::where('id',(int)$request->id_p)->update(array('id_statut'=>2));
                
                $pdfControler = new PDFController();
                $pdfControler->generateConstatConformite($id_constat);
                
                
                notificationCCObtenu((int)$request->id_p);
            
                return redirect(route('liste.delivres_constat'))->with('success', "Constat de conformité émis avec succès");
            }
            else
            {
                return redirect(route('liste.delivres_constat'))->with('error', "Echec d'enregistrement");
            }

    }

    else
    {

        if (!empty(trim($request->observation)) || !is_null(trim($request->observation))) 
        {   
            if ($request->conforme1==0 && $request->conforme2==1) 
                { 
            
                $observation = "Les informations sont non conformes au contenu de la demande du réquérant.\n ".trim($request->observation);
                }
            elseif ($request->conforme2==0 && $request->conforme1==1) 
                {

                $observation = "Les informations sont non conformes à la réglementation en vigeur en république du Bénin.\n ".trim($request->observation);
                }
            elseif ($request->conforme1==0 && $request->conforme2==0) 
                {
           
                $observation = "Les informations sont non conformes au contenu de la demande du réquérant et non conformes à la réglementation en vigeur en république du Bénin.\n ".trim($request->observation);
                }
               
        }
        else
        {
            if ($request->conforme1==0 && $request->conforme2==1) 
            { 
            
                $observation = "Les informations sont non conformes au contenu de la demande du réquérant";
            }

            elseif ($request->conforme2==0 && $request->conforme1==1) 
            {

                $observation = "Les informations sont non conformes à la réglementation en vigeur en république du Bénin";
            }
            elseif ($request->conforme1==0 && $request->conforme2==0) 
            {
           
                $observation = "Les informations sont non conformes au contenu de la demande du réquérant et non conformes à la réglementation en vigeur en république du Bénin";
            }
        }

    }

       $data = [
            "id_procedure_exportation"=>(int)$request->id_p,
            "id_statut_avant_rejet"=>1,
            "id_statut_apres_rejet"=>1002,
            "id_agent_traitant"=>$id_agent->id,
            "raison_rejet"=>$observation,
            "date_rejet"=>\Carbon\Carbon::now()
        ];
        
        $response = RejetProcedureExportation::create($data);

       if ($response) 
       {
            ProcedureExportation::where('id',(int)$request->id_p)->update(array('id_statut'=>1002));
            
            notificationRejetConstatConformite($request->id_p);

            return redirect(route('liste.constat_rejete'))->with('success', "Constat de conformité rejeté avec succès");
        }
        else
        {
           return redirect(route('liste.delivres_constat'))->with('error', "Echec du rejet du constat de confirmé. Veuillez réessayer"); 
        }


    }

    public function show_traiter_constat($id){

         $procedureEnAttentesDetails = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

         $attente = 1;

    if( $procedureEnAttentesDetails!=null)
    {

        $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);

        $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

        if ($gradeAgent==null) 
        {

            return redirect('/constat_conformite/attente')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
        }


        return view('/constat_conformite/traiter_constat_attente', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent'));
        }
        else
        {
            return redirect('/constat_conformite/attente')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );
        }

    }

    public function show_en_attente_constat($id){

        $procedureEnAttentesDetails = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        if($procedureEnAttentesDetails!=null)
        {

        $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id); 

      

        return view('/constat_conformite/details_constat_attente', compact('procedureEnAttentesDetails', 'caracProdExportations'));
        }
        else
        {

            return redirect('/constat_conformite/attente')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );

        }

    }

    public function show_constat_rejete($id){

        $procedureEnAttentesDetails = $this->modelRejetProcedureExportation->get_procedure_rejeter_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

    if($procedureEnAttentesDetails!=null)
    {

        $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id); 

        $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

        if ($gradeAgent==null) 
        {
            return redirect('/constat_conformite/rejete')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
        }
        return view('/constat_conformite/details_constat_rejete', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent'));
    }
    else
    {
        return redirect('/constat_conformite/rejete')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );
    }

}



    public function show_delivre_constat($id){

    $constatConformite = $this->modelConstatConformite->get_constat_conformites_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

    if($constatConformite!=null)
    {

        $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

        if ($gradeAgent==null) 
        {
            
            return redirect('/constat_conformite/rejete')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
        }

        $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($constatConformite->id_procedure_exportation); 

            return view('/constat_conformite/details_constat_delivre', compact('caracProdExportations','constatConformite','gradeAgent'));

    }
    
    else
    {
        return redirect('/constat_conformite/delivres')->with('error', "Cette procédure ne possède pas encore un constat de confirmité. Veuillez signaler à l'administrateur du système" );
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
