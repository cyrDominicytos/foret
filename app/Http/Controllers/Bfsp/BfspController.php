<?php

namespace App\Http\Controllers\Bfsp;


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
use App\Models\Visa;
use App\Models\AvisTechnique;
use App\Models\RejetProcedureExportation;
use \Auth;
use App\Http\Controllers\HomeController;

// use App\Http\Requests\LaisspassCreateFormRequest;


class BfspController extends Controller
{
    public $modelProcedureExportation = null;
    public $modelCaracProdExportation = null;
    public $modelConstatConformite = null;
    public $modelContreConstat = null;
    public $modelParametre = null;
    public $modelLaissezpasser = null;
    public $modelForestier = null;
    public $modelVisa = null;
    public $modelAvisTechnique = null;
    public $modelRejetProcedureExportation = null;
    protected $home =null; 

    function __construct(){

        $this->modelProcedureExportation = new ProcedureExportation();
        $this->modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();
        $this->modelConstatConformite = new ConstatConformite();
        $this->modelContreConstat = new ContreConstat();
        $this->modelParametre = new Parametre();
        $this->modelLaissezpasser = new LaissezPasser();
        $this->modelAvisTechnique = new AvisTechnique();
        $this->modelForestier = new Forestier();
        $this->modelVisa = new Visa();
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


    public function liste_en_attente_visa(){
      session(['back' => Route('liste.en_attente_visa')]);

       $procedures  =  $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_intervenant(7);
       return view('/bfsp/liste_visa_en_attente', compact('procedures'));
    }

    
    public function liste_rejete_visa(){
      session(['back' => Route('liste.visa_rejete')]);
 

    $procedures =  $this->modelRejetProcedureExportation->get_procedure_rejeter_statut_apres_for_poste(1009,forestier_user_id(Auth::user()->id)->id_poste);

          
       return view('/bfsp/liste_visa_rejete', compact('procedures'));
        
    }

    public function liste_delivres_visa(){
        session(['back' => Route('liste.delivres_visa')]);

          $procedures =  $this->modelVisa->get_avis_techniques_vise();
        return view('/bfsp/liste_visa_delivres', compact('procedures'));
        
    }

    public function store_procedure_en_attente_visa(Request $request){

        $id_agent = Forestier::where('id_user',Auth::user()->id)->first();

        if ($id_agent==null) {

            return redirect(route('liste.delivres_visa'))->with('error', "Vous n'avez pas l'autorisation requise pour effectuer cette action");

        }

        $process = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_id($request->id_p)->first();

         if($request->visa != null && $request->visa->isValid())
            {

            $at = AvisTechnique::where('id_procedure_exportation',$request->id_p)->first();
            if ($at==null) {
               return redirect(route('liste.delivres_visa'))->with('error', "Cette procédure ne possède pas un Avis Technique");
            }

            $data = [
            "autorite"=>Auth::user()->id,
            "entite_vise"=>"avis_techniques",
            "entite_id"=>$at->id,
            "observation"=>$request->observation,
            "date_visa"=>\Carbon\Carbon::now()
            ];


            $response = Visa::create($data);

            if ($response) {

                $full_name = $process->prenom_user."_".$process->nom_user;
                $file_path = "public/at_vise/".date('Y')."/".$process->prenom_user."_".$process->nom_user."/";

                $file_path2 = "at_vise/".date('Y')."/".$process->prenom_user."_".$process->nom_user."/";
               
                $file_path = perform_links($file_path);
                $file_path2 = perform_links($file_path2);
                $file_extension= $request->visa->getClientOriginalExtension();
                $pdf_name = perform_links2(perform_links('at_vise_'.$process->numero."_".$full_name)).'.'.$file_extension;
                $request->visa->storeAs($file_path,$pdf_name);

             save_file_in_doc($pdf_name, $file_path2, $request->id_p,'visas', 8);

              ProcedureExportation::where('id',(int)$request->id_p)->update(array('id_statut'=>9));
              notificationVISAATObtenu($request->id_p,$response->id);
               return redirect(route('liste.delivres_visa'))->with('success', "Avis Technique visé avec succès");
            }
                 else
                {
                 return redirect(route('liste.delivres_visa'))->with('error', "Echec d'apposition du visa sur l'Avis Technique");
                }

               

        }
        else{   

            $data = [
            "id_procedure_exportation"=>(int)$request->id_p,
            "id_statut_avant_rejet"=>7,
            "id_statut_apres_rejet"=>1009,
            "id_agent_traitant"=>$id_agent->id,
            "raison_rejet"=>($request->observation!=null) ? ($request->observation) : (''),
            "date_rejet"=>\Carbon\Carbon::now(),
            ];
            
            $response = RejetProcedureExportation::create($data);
         
            if($response)
            {
            ProcedureExportation::where('id',(int)$request->id_p)->update(array('id_statut'=>1009));
             notificationVISAATRejete($request->id_p,$id_agent->id);
            return redirect(route('liste.visa_rejete'))->with('success', "Avis Technique rejeté avec succès");
            } 

             return redirect(route('liste.visa_rejete'))->with('error', " Echec du rejet d'apposition du visa  sur l'Avis Technique");
               
        }
        
       return redirect(route('liste.visa_rejete'))->with('error', " Mauvaise manipulation");

    }

    public function show_en_attente_visa($id){

        $at = AvisTechnique::where('id_procedure_exportation',$id)->first();

    

if ($at!=null) 
{


     $procedureEnAttentesDetails = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        if( $procedureEnAttentesDetails!=null)
        {

         $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

            if ($gradeAgent==null) 
            {

            return redirect('/visa/attente')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
            }

            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($procedureEnAttentesDetails->id); 

            $laisser_passer = LaissezPasser::where('id_procedure_exportation',$procedureEnAttentesDetails->id)->first();

        if ($laisser_passer==null) {

            return redirect('/visa/attente')->with('error', "Cette procédure ne possède pas encore un Laissez-passer. Veuillez contacter l'administrateur du système" );
           
        }

        $detailsLaissezPassers = $this->modelLaissezpasser->get_laissez_passers_all_info_by_id_for_poste($laisser_passer->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        $constatConformite = ConstatConformite::where('id_procedure_exportation',$procedureEnAttentesDetails->id)->first();

            if ($constatConformite==null) 
            {

            return redirect('/visa/attente')->with('error', "Cette procédure ne possède pas encore un constat de conformité. Veuillez contacter l'administrateur du système" );
            }


        return view('/bfsp/details_visa_attente', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent'));
        }

         else
        {
            return redirect('/visa/attente')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );
        }
            
}
    
else
{

return redirect('/visa/attente')->with('error', "Cette procédure ne possède pas encore un Avis Technique. Veuillez contacter l'administrateur du système" );
}


       
    }

    public function show_en_attente_visa_traiter($id){

    
        $constatConformite = ConstatConformite::where('id_procedure_exportation',$id)->first();

        if ($constatConformite==null) {

            return redirect('/visa/attente')->with('error', "Cette procédure ne possède pas encore un constat de conformité. Veuillez contacter l'administrateur du système" );
           
        }

       $procedureEnAttentesDetails = $this->modelConstatConformite->get_constat_conformites_all_info_by_id_for_poste($constatConformite->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        if( $procedureEnAttentesDetails!=null)
        {

        $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);  

        $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

        $laisser_passer = LaissezPasser::where('id_procedure_exportation',$id)->first();

        if ($laisser_passer==null) {

            return redirect('/visa/attente')->with('error', "Cette procédure ne possède pas encore un Laissez-passer. Veuillez contacter l'administrateur du système" );
           
        }

        $detailsLaissezPassers = $this->modelLaissezpasser->get_laissez_passers_all_info_by_id_for_poste($laisser_passer->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

            if ($gradeAgent==null) 
            {

            return redirect('/visa/attente')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
            }

           

       
        return view('/bfsp/traiter_visa_attente', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent','detailsLaissezPassers'));
    }
    else{
            return redirect('/visa/attente')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );
    }

    }



public function show_visa_rejete($id){

$at = AvisTechnique::where('id_procedure_exportation',$id)->first();

    

if ($at!=null) 
{


     $procedureEnAttentesDetails = $this->modelRejetProcedureExportation->get_procedure_rejeter_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        if( $procedureEnAttentesDetails!=null)
        {

         $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

            if ($gradeAgent==null) 
            {

            return redirect('/visa/rejete')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
            }

            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($procedureEnAttentesDetails->id); 

            $laisser_passer = LaissezPasser::where('id_procedure_exportation',$procedureEnAttentesDetails->id)->first();

        if ($laisser_passer==null) {

            return redirect('/visa/rejete')->with('error', "Cette procédure ne possède pas encore un Laissez-passer. Veuillez contacter l'administrateur du système" );
           
        }

        $detailsLaissezPassers = $this->modelLaissezpasser->get_laissez_passers_all_info_by_id_for_poste($laisser_passer->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        $constatConformite = ConstatConformite::where('id_procedure_exportation',$procedureEnAttentesDetails->id)->first();

            if ($constatConformite==null) 
            {

            return redirect('/visa/rejete')->with('error', "Cette procédure ne possède pas encore un constat de conformité. Veuillez contacter l'administrateur du système" );
            }


        return view('/bfsp/details_visa_rejete', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent'));
        }

         else
        {
            return redirect('/visa/rejete')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );
        }
            
}
    
else
{

return redirect('/visa/rejete')->with('error', "Cette procédure ne possède pas encore un Avis Technique. Veuillez contacter l'administrateur du système" );
}

}



    public function show_delivre_visa($id){

    $at = AvisTechnique::where('id_procedure_exportation',$id)->first();

    

if ($at!=null) 
{

        $visa = Visa::where('entite_id',$at->id)->first();

    if ($visa!=null) 
    {


    $procedureEnAttentesDetails = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        if( $procedureEnAttentesDetails!=null)
        {

         $gradeAgent = Forestier::where('id_user',Auth::user()->id)->first();

            if ($gradeAgent==null) 
            {

            return redirect('/visa/delivres')->with('error', "Accès non autorisé, veuillez contacter l'administrateur" );
            }

            $caracProdExportations = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($procedureEnAttentesDetails->id); 

            $laisser_passer = LaissezPasser::where('id_procedure_exportation',$procedureEnAttentesDetails->id)->first();

        if ($laisser_passer==null) {

            return redirect('/visa/delivres')->with('error', "Cette procédure ne possède pas encore un Laissez-passer. Veuillez contacter l'administrateur du système" );
           
        }

        $detailsLaissezPassers = $this->modelLaissezpasser->get_laissez_passers_all_info_by_id_for_poste($laisser_passer->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

        $constatConformite = ConstatConformite::where('id_procedure_exportation',$procedureEnAttentesDetails->id)->first();

            if ($constatConformite==null) 
            {

            return redirect('/visa/delivres')->with('error', "Cette procédure ne possède pas encore un constat de conformité. Veuillez contacter l'administrateur du système" );
            }


        return view('/bfsp/details_visa_delivre', compact('procedureEnAttentesDetails', 'caracProdExportations','gradeAgent','visa'));
        }

         else
        {
            return redirect('/visa/delivres')->with('error', "La procédure à laquelle vous essayez d'acceder n'existe pas" );
        }
            

    }

    else
    {
             return redirect('/visa/delivres')->with('error', "Cette procédure ne possède pas encore Visa. Veuillez contacter l'administrateur du système" );
    }

}
    
else
{

return redirect('/visa/delivres')->with('error', "Cette procédure ne possède pas encore un Avis Technique. Veuillez contacter l'administrateur du système" );
}
        
       

    }


}
