<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaissezPasser;
use App\Models\ProcedureExportation;
use App\Models\RejetProcedureExportation;
use App\Models\DemandeAnnuelle;
use App\Models\ConstatConformite;
use App\Models\ContreConstat;
use App\Models\EtatVersement;
use App\Models\Visa;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    public $modelProcedureExportation = null;
    public $modelDemandeRejet = null;
    public $modelConstatConformite = null;
    public $modelContreConstat = null;
    public $modelEtatverse = null;
    public $modelVisa = null;
    public $modelLaissezpasser = null;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $ProcedureExportation = null;

    public function __construct() {
        //$this->middleware('auth');
        $this->middleware('web');

        $this->modelProcedureExportation = new ProcedureExportation();
        $this->modelDemandeRejet = new RejetProcedureExportation();
        $this->modelConstatConformite = new ConstatConformite();
        $this->modelContreConstat = new ContreConstat();
        $this->modelEtatverse = new EtatVersement();
        $this->modelVisa = new Visa();
        $this->modelLaissezpasser = new LaissezPasser();
    }

    /**
     * Show the application landingpage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function acceuil() {
        return view('index');
    }

    public function apropos()
    {
        return view('apropos');
    }

    public function contact()
    {
        return view('contact');
    }

    public function index() {
         session(['back' =>Route('home')]);

        if (user_web()->forestier){
            return $this->indexForestier();
        } elseif (user_web()->intervenant) {
            return $this->indexIntervenant();
        } elseif (user_web()->usager) {
           return $this->indexUsager();
        } elseif (user_web()->isSuperOrAdmin()) {
            $data['link'] = 'layouts.tableau_bord_admin';
            return view('home', $data);
        } else {
            $data['link'] = 'layouts.tableau_bord_vide';
            return view('home', $data);
        }
    }


    private function indexForestier() {

        // dd(user_web()->forestier->poste->postesFils->pluck('id'));
//   dd(user_web()->forestier->poste->postesFils->pluck('id')->toArray());
 
        if (user_web()->hasRole(['Responsable_SCEFC', 'Agent_Forestier_SCEFC',])) {

           $link = 'layouts.tableau_bord_rscefc';

        $passDelivres = $this->modelConstatConformite->get_constat_conformites_all_info(forestier_user_id(Auth::user()->id)->id_poste);

        $procedureEnAttentes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(1, forestier_user_id(Auth::user()->id)->id_poste);

        $procedureRejetes = $this->modelDemandeRejet->get_procedure_rejeter_statut_apres_for_poste(1002,forestier_user_id(Auth::user()->id)->id_poste);

        $procedure = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_rscef_limit10(1,1002,forestier_user_id(Auth::user()->id)->id_poste);
        
        $link = 'layouts.tableau_bord_rscefc';
        return view('home', compact('link', 'passDelivres', 'procedureEnAttentes', 'procedureRejetes', 'procedure'));
            

        } elseif (user_web()->hasRole('Chef_IF')||user_web()->hasRole('Agent_Forestier_IF')||user_web()->hasRole('Chef_Cantonnement')||user_web()->hasRole('Agent_Forestier_Cantonnement')) {
 
        $passDelivres = $this->modelLaissezpasser->get_laissez_passers_all_info(forestier_user_id(Auth::user()->id)->id_poste);
        $procedureEnAttentes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(2, forestier_user_id(Auth::user()->id)->id_poste);
        $procedureEnAttentesExtension = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut(7,forestier_user_id(Auth::user()->id)->id_poste);
        $procedureRejetes =  $this->modelDemandeRejet->get_procedure_rejeter_statut_apres_for_poste(1003,forestier_user_id(Auth::user()->id)->id_poste);
         $procedure = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_rscef_limit10(2,1003,forestier_user_id(Auth::user()->id)->id_poste);

        $link = 'layouts.tableau_bord_cif';
        return view('/home', compact('link','passDelivres', 'procedureEnAttentes', 'procedureEnAttentesExtension', 'procedureRejetes', 'procedure'));

            
        } elseif (user_web()->hasRole(['Commandant_BFSP', 'Agent_Forestier_BFSP',])) {

            $link = 'layouts.tableau_bord_bfsp';
           
        $procedure  =  $this->modelProcedureExportation->get_procedure_exportation_all_info_en_traitement_limit10_for_intervenant2(7,1009);


            return view('home', compact('link','procedure'));
        } elseif (user_web()->hasRole(['Directeur_PCEFC', 'Agent_Forestier_PCEFC',])) {
            
        $passDelivres = $this->modelContreConstat->get_contre_constats_all_info(forestier_user_id(Auth::user()->id)->id_poste);

        

        $procedureEnAttentes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(3, forestier_user_id(Auth::user()->id)->id_poste);

        $procedureRejetes = $this->modelDemandeRejet->get_procedure_rejeter_statut_apres_for_poste(1004,forestier_user_id(Auth::user()->id)->id_poste);

         $procedure  =  $this->modelProcedureExportation->get_procedure_exportation_all_info_en_traitement_limit10_for_intervenant2(3,1004);
        
        $link = 'layouts.tableau_bord_dpcefc';
        return view('home', compact('link', 'passDelivres', 'procedureEnAttentes','procedureRejetes','procedure'));

        }elseif (user_web()->hasRole(['Directeur_RAF', 'Agent_Forestier_DRAF',])) {

             $etatDelivres = $this->modelEtatverse->get_etat_versements_all_info(forestier_user_id(Auth::user()->id)->id_poste);
             $etatAttentes = $this->modelProcedureExportation->get_procedure_exportation_all_info_by_statut_for_poste(4,forestier_user_id(Auth::user()->id)->id_poste);
              $procedure  =  $this->modelProcedureExportation->get_procedure_exportation_all_info_en_traitement_limit10_for_draf([3,4,6,1004,1007]);
            $link = 'layouts.tableau_bord_draf';

             return view('home', compact('link', 'etatDelivres', 'etatAttentes','procedure'));

        }elseif (user_web()->hasRole(['Directeur_DGEFC'])) {
            $data = [];
                $demande_totale = DemandeAnnuelle::all()->count();
                $process_en_cours = ProcedureExportation::whereNotIn('id_statut', [13])
                                ->where('id_statut', 'not like', '100%')
                                ->count();
                $process_finalisees = ProcedureExportation::where('procedure_exportations.id_statut', 13)
                                ->count();
                $pro = new ProcedureExportation();
                $process_rejetees = ProcedureExportation::where('procedure_exportations.id_statut', 'like', '100%')->count();
                $v_process = $pro->get_procedure_exportation_all_info_en_traitement_limit10_dgefc();
           
             $link = 'layouts.tableau_bord_dgefc';
             return view('home', compact('link', 'demande_totale', 'process_en_cours', 'process_finalisees', 'process_rejetees','v_process'));

        }
        //simple agent forestier
        else {
             
            $link = 'layouts.tableau_bord_forestier';
            return view('home', compact('link'));
        }




       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function indexIntervenant() {
        $pro = new ProcedureExportation();  
        if (user_web()->hasRole(['Agent_PAC'])) {
        $v_process = $pro->get_procedure_exportation_all_info_en_traitement_limit10_for_intervenant2(9,10010);
        $link = 'layouts.tableau_bord_benin_control';
        return view('home', compact('link','v_process'));
            
        } elseif (user_web()->hasRole(['Agent_CNCB'])) {
   
        $link = 'layouts.tableau_bord_cncb';
         $v_process = $pro->get_procedure_exportation_all_info_vgm_attente_limit10();
        
        return view('home', compact('link','v_process'));
            
        } elseif (user_web()->hasRole(['Agent_Douane'])) {
 
           
        $link = 'layouts.tableau_bord_douane';
      $v_process = $pro->get_procedure_exportation_all_info_en_traitement_limit10_for_intervenant2(10,12);
        return view('home', compact('link','v_process'));

            
        } 
    }

    private function indexUsager() {
        $data = [];
        $id_usager = usager_id_user(Auth::user()->id) ? (usager_id_user(Auth::user()->id)) : null;

        if ($id_usager != null and $id_usager != []) {
            $demande_totale = DemandeAnnuelle::where('id_usager', $id_usager->id)->count();
            $process_en_cours = ProcedureExportation::whereNotIn('id_statut', [13])
                            ->where('id_statut', 'not like', '100%')
                            ->where('id_usager', $id_usager->id)->count();
            $process_finalisees = ProcedureExportation::where('procedure_exportations.id_statut', 13)
                            ->where('id_usager', $id_usager->id)->count();
            $pro = new ProcedureExportation();
            $process_rejetees = ProcedureExportation::where('procedure_exportations.id_statut', 'like', '100%')->where('id_usager', $id_usager->id)->count();

            $v_process = $pro->get_procedure_exportation_all_info_en_traitement_limit10($id_usager->id);
        }

        $link = 'layouts.tableau_bord_exploitant';
        return view('home', compact('link', 'demande_totale', 'process_en_cours', 'process_finalisees', 'process_rejetees','v_process'));
    }

}
