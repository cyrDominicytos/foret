<?php

use App\Models\User;

use Illuminate\Support\Facades\Auth;


use App\Models\Pay;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\Usager;
use App\Models\ProcedureExportation;
use App\Models\DemandeAnnuelle;
use App\Models\CaracteristiqueProduitProcedureExportation;
use App\Models\TypeProduit;
use App\Models\EspeceProduit;
use App\Models\LaissezPasser;
use App\Models\Forestier;
use App\Models\ConstatConformite;
use App\Models\ContreConstat;
use App\Models\EtatVersement;
use App\Models\Poste;
use App\Models\Vgm;
use App\Models\Visa;
use App\Models\Bfu;
use App\Models\RejetProcedureExportation;
use App\Models\AvisTechnique;
use App\Models\Scanning;
use Illuminate\Http\Request;



	if(!function_exists('notificationCreationProcedure')){
		
		function notificationCreationProcedure($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id);
			
	        $view_url = 'emails.creation_procedure_mail';
	                $data = [
	                    'data' => $procedureInfos[0],
	                ];
					$destinatairesInfo = email_liste($procedureInfos[0]->id_poste,105);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {

	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	       
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "CREATION D'UNE NOUVELLE PROCEDURE D'EXPORTATION";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }


	                $destinatairesInfo = email_liste_for_poste($procedureInfos[0]->id_poste);
	                if($destinatairesInfo != null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "CREATION D'UNE NOUVELLE PROCEDURE D'EXPORTATION";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }
		}
	}

	if(!function_exists('notificationMiseAJourProcedure')){
		
		function notificationMiseAJourProcedure($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id);
	       
	       	$view_url = 'emails.maj_procedure_mail';
	        $data = [
	            
	                    'data' => $procedureInfos[0],
	               ];
	                $destinatairesInfo = email_liste($procedureInfos[0]->id_poste,105);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "MISE A JOUR D'UNE PROCEDURE D'EXPORTATION";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }


	                $destinatairesInfo = email_liste_for_poste($procedureInfos[0]->id_poste);
	                if($destinatairesInfo != null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "MISE A JOUR D'UNE PROCEDURE D'EXPORTATION";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }
	               
		}
	}


	if(!function_exists('notificationCCObtenu')){
		
		function notificationCCObtenu($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id);
	        if($procedureInfos)
	        {
	             $CCInfo = ConstatConformite::where('id_procedure_exportation', $procedureInfos[0]->id);

	                if($CCInfo)
	                    $CCInfo = $CCInfo->get();



	              $view_url = 'emails.creation_constat_conformite_mail';
	                $data = [
	            
	                    'data' => $procedureInfos[0],
	                ];


	                  $agent_traitant = user_forestier_id($CCInfo[0]->id_agent_traitant) ;
	                  $usager = user_usager_id($procedureInfos[0]->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                         $data['prenom'] = $usager->firstname;
	                         $data['nom'] = $usager->name;
	                         $data['agent_traitant'] = $agent_traitant->firstname.' '.$agent_traitant->name;
	                         $data['created_at'] = $CCInfo[0]->date_constat;
	                         $sujet = "OBTENTION DU CONSTAT DE CONFORMITE";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }


	                $view_url = 'emails.creation_constat_conformite_mail_cif';
	                $destinatairesInfo = email_liste($procedureInfos[0]->id_poste,103);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "NOTIFICATION DE DEMANDE DE LAISSEZ-PASSER";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }  

	                $view_url = 'emails.creation_constat_conformite_mail_cif';
	                $destinatairesInfo = email_liste($procedureInfos[0]->id_poste,104);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "NOTIFICATION DE DEMANDE DE LAISSEZ-PASSER";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }

	                $view_url = 'emails.demande_vgm_mail';
	                $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteIntervenant(400);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "NOTIFICATION DE DEMANDE DE LA FICHE VGM";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }

	              
	        }
			}

	}



	
	// ------------------------------------------------------------------------

		if(!function_exists('notificationDemandeLP')){
		
		function notificationDemandeLP($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id);
	        if($procedureInfos)
	        {
	             $LPInfo = LaissezPasser::where('id_procedure_exportation', $procedureInfos[0]->id);

	                if($LPInfo)
	                    $LPInfo = $LPInfo->get();

	              $view_url = 'emails.delivrance_laissez_passer';
	                $data = [
	            
	                    'data' => $procedureInfos[0],
	                ];


	                  $agent_emetteur = user_forestier_id2($LPInfo[0]->id_agent_emission);
	                
	                  $usager = user_usager_id($procedureInfos[0]->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                         $data['id'] = $LPInfo[0]->id;
	                         $data['prenom'] = $usager->name;
	                         $data['nom'] = $usager->firstname;
	                         $data['num_pass'] = $LPInfo[0]->numero;
	                         $data['agent_emetteur'] = $agent_emetteur->name.' '.$agent_emetteur->firstname;
	                         $data['date_laissez_passer'] = $LPInfo[0]->date_laissez_passer;
	                         $sujet = "OBTENTION DE LAISSEZ-PASSER";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }




	                    //Notif DRAF
	               $view_url = 'emails.creation_laissez_passer_mail_draf';
	                $destinatairesInfo = email_liste($procedureInfos[0]->id_poste,101);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "NOTIFICATION DE DEMANDE DE CONTRE CONSTAT";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }


	                 //Notif DPCEFC
	                $view_url = 'emails.creation_laissez_passer_mail_draf';
	                $destinatairesInfo = email_liste($procedureInfos[0]->id_poste,102);

					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "NOTIFICATION DE DEMANDE DE CONTRE CONSTAT";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }
	        	}     

	              
	        }
		

	}

	

	if(!function_exists('notificationExtensionLP')){
		
		function notificationExtensionLP($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id);
	        if($procedureInfos)
	        {  
	            $LPInfo = LaissezPasser::where('id_procedure_exportation', $procedureInfos[0]->id);

	                if($LPInfo)
	                    $LPInfo = $LPInfo->get();
	                	

	              $view_url = 'emails.extension_date_validite_lp';
	                $data = [
	            
	                    'data' => $procedureInfos[0],
	                ];

	              
	                  $agent_emetteur = user_forestier_id2($LPInfo[0]->id_agent_emission);
	                  $agent_extension = user_forestier_id2($LPInfo[0]->id_agent_extension);
	                  	// dd($LPInfo[0]->id_agent_extension);
	                
	                  $usager = user_usager_id($procedureInfos[0]->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                         $data['id'] = $LPInfo[0]->id;
	                         $data['prenom'] = $usager->name;
	                         $data['nom'] = $usager->firstname;
	                         $data['num_pass'] = $LPInfo[0]->numero;
	                         $data['agent_emetteur'] = $agent_emetteur->name.' '.$agent_emetteur->firstname;
	                         $data['agent_extension'] = $agent_extension->name.' '.$agent_extension->firstname;
	                         $data['date_laissez_passer'] = $LPInfo[0]->date_laissez_passer;
	                         $data['date_fin_etendue'] = $LPInfo[0]->fin_validite_etendue;
	                         $sujet = "EXTENSION DE VALIDITE DE LAISSEZ-PASSER";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }

		                //Notif DRAF et DPEFC
	               $view_url = 'emails.extension_date_validite_lp_mail_draf';
	                $destinatairesInfo = email_liste($procedureInfos[0]->id_poste,102);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "NOTIFICATION D'EXTENSION DE VALIDITE DE LAISSEZ-PASSER";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }



	                $view_url = 'emails.extension_date_validite_lp_mail_draf';
	                $destinatairesInfo = email_liste($procedureInfos[0]->id_poste,101);

					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "NOTIFICATION D'EXTENSION DE VALIDITE DE LAISSEZ-PASSER";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }
	        }     

		}
	}



	if(!function_exists('notificationRejetLP')){
		
		function notificationRejetLP($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id);
	        if($procedureInfos)
	        {
	            $rejetInfo = RejetProcedureExportation::where('id_procedure_exportation', $procedureInfos[0]->id)->where('id_statut_apres_rejet', 1003);

	                if($rejetInfo)
	                    $rejetInfo = $rejetInfo->get();



	              $view_url = 'emails.rejet_demande_laissez_passer';
	                $data = [
	            
	                    'data' => $procedureInfos[0],
	                ];

	              
	                  $agent_traitant = User::where('id',$rejetInfo[0]->id_agent_traitant)->first() ;
	              
	                  $usager = user_usager_id($procedureInfos[0]->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                         $data['id'] = $procedureInfos[0]->id;
	                         $data['prenom'] = $usager->name;
	                         $data['nom'] = $usager->firstname;
	                         $data['agent_traitant'] = $agent_traitant->name.' '.$agent_traitant->firstname;
	                         $data['date_rejet'] = $rejetInfo[0]->date_rejet;
	                         $data['raison'] = $rejetInfo[0]->raison_rejet;
	                         $sujet = "REJET DE LA DEMANDE DE LAISSEZ-PASSER";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	        }     

		}
	}


	if(!function_exists('notificationObtentionET')){
		
		function notificationObtentionET($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id)->first();
			$modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();


	        if($procedureInfos)
	        {
	             $ETInfo = EtatVersement::where('id_procedure_exportation', $procedureInfos->id)->first();

	              $caracteristiques = $modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($procedureInfos->id);
	             

	              $view_url = 'emails.notif_etat_versement_to_usager';
	                $data = [
	            
	                    'data' => $caracteristiques,
	                ];

	                  $agent_traitant = user_forestier_id2($ETInfo->id_agent_traitant);
	                
	                  $usager = user_usager_id($procedureInfos->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                         $data['id'] = $ETInfo->id;
	                         $data['id_procedure_export'] = $procedureInfos->id;
	                         $data['prenom'] = $usager->name;
	                         $data['nom'] = $usager->firstname;
	                         $data['num_etat_vers'] = $ETInfo->numero;
	                         $data['agent_traitant'] = $agent_traitant->name.' '.$agent_traitant->firstname;
	                         $data['montant_total'] = $ETInfo->montant_total;
	                         $data['date_versement'] = $ETInfo->date_versement;
	                         $sujet = "OBTENTION D'ETAT DE VERSEMENT";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }

	                         //Notif DRAF et DPEFC
	          

	    //             $view_url = 'emails.obtention_etat_versement';
	    //             $destinatairesInfo = email_liste($procedureInfos->id_poste,101);

					// if($destinatairesInfo!= null)
	    //             foreach ($destinatairesInfo as $auth_id) {
	    //               $user =user_by_id($auth_id) ;
	    //               if($user != null)
	    //                 {
	    //                     $destinataires = $user->email;
	    //                      $data['prenom'] = $user->name;
	    //                      $data['nom'] = $user->firstname;
	                       
	    //                      $sujet = "ETAT DE VERSEMENT";
	    //                      mail_send($view_url,  $data, [$destinataires], $sujet);
	    //                 }
	                    	                 
	    //             }
	              
	        }
	    }
		

	}




	if(!function_exists('notificationContreConstatObtenu')){
		
		function notificationContreConstatObtenu($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id);
	        if($procedureInfos)
	        {
	             $ContreConstatInfo = ContreConstat::where('id_procedure_exportation', $procedureInfos[0]->id);

	                if($ContreConstatInfo)
	                    $ContreConstatInfo = $ContreConstatInfo->get();



	              $view_url = 'emails.creation_contre_constat_mail';
	                $data = [
	            
	                    'data' => $procedureInfos[0],
	                ];

	              
	                  $agent_traitant = user_forestier_id($ContreConstatInfo[0]->id_agent_traitant) ;
	                  $usager = user_usager_id($procedureInfos[0]->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                         $data['prenom'] = $usager->name;
	                         $data['nom'] = $usager->firstname;
	                         $data['agent_traitant'] = $agent_traitant->name.' '.$agent_traitant->firstname;
	                         $data['created_at'] = $ContreConstatInfo[0]->date_contre_constat;
	                         $data['conformite_constat'] = ($ContreConstatInfo[0]->conformite_au_constat_conformite== 1) ? ('Conforme') :('Non conforme');
	                         $sujet = "OBTENTION DU CONTRE CONSTAT";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }

	                    $view_url = 'emails.creation_contre_constat_mail_draf';
	                	$destinatairesInfo = email_liste($procedureInfos[0]->id_poste,101);
						if($destinatairesInfo!= null)
	                	foreach ($destinatairesInfo as $auth_id) {
	                  	$user =user_by_id($auth_id) ;
	                  	if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "NOTIFICATION DE DEMANDE DE L'ETAT DE VERSEMENT";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                }
	              
	        }
			}

	}


	if(!function_exists('notificationRejetConstatConformite')){
		
		function notificationRejetConstatConformite($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id);
	        if($procedureInfos)
	        {
	            $rejetInfo = RejetProcedureExportation::where('id_procedure_exportation', $procedureInfos[0]->id);

	                if($rejetInfo)
	                    $rejetInfo = $rejetInfo->get();
	              $view_url = 'emails.rejet_constat_conformite';
	                $data = [
	                    'data' => $procedureInfos[0],
	                ];

	                  $agent_traitant = User::where('id',$rejetInfo[0]->id_agent_traitant)->first() ;
	              
	                  $usager = user_usager_id($procedureInfos[0]->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                         $data['prenom'] = $usager->name;
	                         $data['nom'] = $usager->firstname;
	                         $data['agent_traitant'] = $agent_traitant->name.' '.$agent_traitant->firstname;
	                         $data['date_rejet'] = $rejetInfo[0]->date_rejet;
	                         $data['raison'] = $rejetInfo[0]->raison_rejet;
	                         $sujet = "REJET DU CONSTAT DE CONFORMITE";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	        }     

		}
	}



	if(!function_exists('notificationRejetContreConstat')){
		
		function notificationRejetContreConstat($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id);
	        if($procedureInfos)
	        {
	            $rejetInfo = RejetProcedureExportation::where('id_procedure_exportation', $procedureInfos[0]->id);

	                if($rejetInfo)
	                    $rejetInfo = $rejetInfo->get();
	              $view_url = 'emails.rejet_contre_constat';
	                $data = [
	                    'data' => $procedureInfos[0],
	                ];

	                  $agent_traitant = User::where('id',$rejetInfo[0]->id_agent_traitant)->first() ;
	              
	                  $usager = user_usager_id($procedureInfos[0]->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                         $data['prenom'] = $usager->name;
	                         $data['nom'] = $usager->firstname;
	                         $data['agent_traitant'] = $agent_traitant->name.' '.$agent_traitant->firstname;
	                         $data['date_rejet'] = $rejetInfo[0]->date_rejet;
	                         $data['raison'] = $rejetInfo[0]->raison_rejet;
	                         $sujet = "REJET DU CONTRE CONSTAT";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	        }     

		}
	}




	if(!function_exists('notificationCreationDemandeAnnuelle')){
		
		function notificationCreationDemandeAnnuelle($id){
				$demandeAnnuelleInfos = DemandeAnnuelle::where('id',$id)->first();
		       if($demandeAnnuelleInfos)
		        {
		             $destinatairesInfo = Forestier::all();
		        
		        	$view_url = 'emails.creation_demande_annuelle';
		                $data = [
		                    'data' => $demandeAnnuelleInfos,
		                ];
		               $posteModel = new Poste();
		              $dgefc =  $posteModel->getPosteDgefcUsers(100);
		                foreach ($dgefc as $destinataire) {
		                 
                         $destinataires = $destinataire->email;
                         $data['destinataires'] = $destinataire->email;;
                         $data['prenom'] = $destinataire->name;
                         $data['nom'] = $destinataire->firstname;
                         $data['date_creation'] = $demandeAnnuelleInfos->date_creation;
        					
		                         $sujet = "CREATION D'UNE DEMANDE ANNUELLE";
		                         mail_send($view_url,  $data, [$destinataires], $sujet);
		                 }



		               $dgefc =  $posteModel->getPosteDgefcUsers(107);
		                foreach ($dgefc as $destinataire) {
		                 
                         $destinataires = $destinataire->email;
                         $data['destinataires'] = $destinataire->email;;
                         $data['prenom'] = $destinataire->name;
                         $data['nom'] = $destinataire->firstname;
                         $data['date_creation'] = $demandeAnnuelleInfos->date_creation;
        					
		                         $sujet = "CREATION D'UNE DEMANDE ANNUELLE";
		                         mail_send($view_url,  $data, [$destinataires], $sujet);
		                 }

		  		 }
			}
		}
	    


	if(!function_exists('notificationMiseAJourDemande')){
			
			function notificationMiseAJourDemande($id){
				$demandeAnnuelleInfos = DemandeAnnuelle::where('id',$id)->first();
		        if($demandeAnnuelleInfos)
		        {
		             $destinatairesInfo = Forestier::all();
		        
		        	$view_url = 'emails.maj_demande_annuelle';
		                $data = [
		                    'data' => $demandeAnnuelleInfos,
		                ];
		               $posteModel = new Poste();
		              $dgefc =  $posteModel->getPosteDgefcUsers(100);
		                foreach ($dgefc as $destinataire) 
		                {
			                 $user = user_by_id($destinataire->id_user) ;
	                         $destinataires = $destinataire->email;
	                         $data['prenom'] = $destinataire->name;
	                         $data['nom'] = $destinataire->firstname;
	                         $data['date_creation'] = $demandeAnnuelleInfos->date_creation;
	        
	                         $sujet = "MISE A JOUR D'UNE DEMANDE ANNUELLE";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
		                 
		     		  }


		     		    $dgefc =  $posteModel->getPosteDgefcUsers(107);
		                foreach ($dgefc as $destinataire) {
		                 
                         $destinataires = $destinataire->email;
                         $data['destinataires'] = $destinataire->email;;
                         $data['prenom'] = $destinataire->name;
                         $data['nom'] = $destinataire->firstname;
                         $data['date_creation'] = $demandeAnnuelleInfos->date_creation;
        					
		                         $sujet = "MISE A JOUR D'UNE DEMANDE ANNUELLE";
		                         mail_send($view_url,  $data, [$destinataires], $sujet);
		                 }
		  		 }

			}
		}
	    


if(!function_exists('notificationReglementEtatVersement')){

		function notificationReglementEtatVersement($id){

			$id_usager = usager_id_user(Auth::user()->id);
            $modelEtatVersement = new EtatVersement();
            $process = $modelEtatVersement->get_etat_versement_all_info_by_id_for_user($id,$id_usager->id);
	        $view_url = 'emails.etat_versement_regler_mail';
	                $data = [
	            
	                    'data' => $process[0],
	                ];
	                $destinatairesInfo = email_liste($process[0]->id_poste,101);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $sujet = "REGLEMENT D'ETAT DE VERSEMENT";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }
		}
	}


// VGM Jointes
if(!function_exists('notificationVGMJointes')){

		function notificationVGMJointes($id){

			$id_usager = usager_id_user(Auth::user()->id);
            $modelVgm = new Vgm();
            $process = $modelVgm->get_vgm_all_info_by_id($id)->first();
	        $view_url = 'emails.vgm_jointe_mail';
	        $sujet = "VGM Délivrée";

	                $data = [
	            
	                    'data' => $process,
	                ];


	               //BFSP
	                $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteStaticAuth(107);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {

	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url, $data, [$destinataires], $sujet);
	                    }

	                    	                 
	                } 


	                //DOUANE
	                $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteIntervenant(200);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }
	                //BC
	                 $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteIntervenant(300);	                
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }
	               

	                //Usager
	                $data['message'] =  "La fiche VGM dr votre procédure d'exportation ". $process->numero." vient d'être délivré.";
	                  $usager = user_usager_id($process->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                        $data['prenom'] = $usager->name;
	                        $data['nom'] = $usager->firstname;
	                       
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
		}
	}
// BFU Jointes
if(!function_exists('notificationBfuJointes')){

		function notificationBfuJointes($id){

			$id_usager = usager_id_user(Auth::user()->id);
            $modelBfu = new Bfu();
            $process = $modelBfu->get_bfu_all_info_by_id($id)->first();
	        $view_url = 'emails.bfu_jointe_mail';
	        $sujet = "BFU Délivré";
	        $data['message'] =  "Le BFU Complet de la procédure d'exportation ". $process->numero." vient d'être délivré.";

	               $data['data'] =  $process;
	                $data['objet'] = "BFU Délivré";

	               //BFSP
	                $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteStaticAuth(107);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {

	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url, $data, [$destinataires], $sujet);
	                    }

	                    	                 
	                } 


	              
	                //BC
	                 $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteIntervenant(300);	                
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }



	                 //Usager
	                $data['message'] =  "Le BFU Complet de votre procédure d'exportation ". $process->numero." vient d'être délivré.";
	                  $usager = user_usager_id($process->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                        $data['prenom'] = $usager->name;
	                        $data['nom'] = $usager->firstname;
	                       
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
		}
	}
	// BFU regleJointes
if(!function_exists('notificationBfuRegle')){

		function notificationBfuRegle($id){

			$id_usager = usager_id_user(Auth::user()->id);
            $modelBfu = new Bfu();
            $process = $modelBfu->get_bfu_all_info_by_id($id)->first();
	        $view_url = 'emails.bfu_jointe_mail';
	        $sujet = "BFU Régé";
	        $data['message'] =  "Le BFU Complet de la procédure d'exportation ". $process->numero." vient d'être réglé.";

	               $data['data'] =  $process;
	               $data['objet'] = "BFU Régé";


	               //BFSP
	                $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteStaticAuth(107);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {

	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url, $data, [$destinataires], $sujet);
	                    }

	                    	                 
	                } 


	              
	                //BC
	                $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteIntervenant(200);	                
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }



	                
		}
	}


// BFU regleJointes
if(!function_exists('notificationLiquidationJointes')){

		function notificationLiquidationJointes($id){

			$id_usager = usager_id_user(Auth::user()->id);
			$modelProcedure = new ProcedureExportation();
			$process = $modelProcedure->get_procedure_exportation_all_info_by_id($id)->first();
            $view_url = 'emails.fermeture_mail';
	        $sujet = "Procédure Finalisée";
	        $data['message'] =  "La procédure d'exportation ". $process->numero." vient d'être finalisée et fermée !";

	               $data['data'] =  $process;
	               $data['objet'] = "Procédure Finalisée";


	               //BFSP
	                $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteStaticAuth(107);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {

	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url, $data, [$destinataires], $sujet);
	                    }

	                    	                 
	                } 


	                //DGEFC
	                $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteDgefcUsers(100);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {

	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url, $data, [$destinataires], $sujet);
	                    }

	                    	                 
	                }


	                //Usager
	                $data['message'] =  "Votre procédure d'exportation ". $process->numero." vient d'être finalisée et fermée !";
	                  $usager = user_usager_id($process->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                        $data['prenom'] = $usager->name;
	                        $data['nom'] = $usager->firstname;
	                        
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
             	                    	                                     
		}
	}


	// Scanning effectué
if(!function_exists('notificationScanning')){

		function notificationScanning($id, $conforme){

			//get_scanning_all_info_by_process
			$id_usager = usager_id_user(Auth::user()->id);
            $view_url = 'emails.scanning_mail';
            $sujet = "RESULTAT DU SCANNING D'UNE PROCEDURE D'EXPORTATION";
            $data = [];
            if($conforme == 1){
            	$model = new Scanning();
            	$process = $model->get_scanning_all_info_by_process($id)->first();
            	$data['resultat'] = 'Scanning conforme';
            }else{
            	$model = new RejetProcedureExportation();
            	$process = $model->get_rejet_all_info_by_process($id)->first();
            	$data['resultat'] = 'Scanning non conforme';
            }
            
        	$data['data'] =  $process;
        	$data['message'] =  "Le résultat de scanning de la procédure d'exportation ". $process->numero." vient d'être délivré.";


	               //BFSP
	                $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteStaticAuth(107);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {

	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url, $data, [$destinataires], $sujet);
	                    }

	                    	                 
	                } 


	                //DOUANE
	                $posteModel = new Poste();
					$destinatairesInfo =  $posteModel->getPosteIntervenant(200);
					if($destinatairesInfo!= null)
	                foreach ($destinatairesInfo as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {
	                        $destinataires = $user->email;
	                        $data['prenom'] = $user->name;
	                        $data['nom'] = $user->firstname;
	                        mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }
	                	                

	                //Usager
	                $data['message'] =  "Le résultat de scanning votre procédure d'exportation ". $process->numero." vient d'être délivré.";
	                  $usager = user_usager_id($process->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                        $data['prenom'] = $usager->name;
	                        $data['nom'] = $usager->firstname;
	                        //$data['agent_traitant'] = $agent_traitant->name.' '.$agent_traitant->firstname;
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
		}
	}



	//AVIS TACHNIQUE

	if(!function_exists('notificationATObtenu')){
		
		function notificationATObtenu($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id)->first();

	     
			if($procedureInfos)
	        {
				
	             $AInfo = AvisTechnique::where('id_procedure_exportation', $procedureInfos->id)->first();
	             $view_url = 'emails.creation_avis_techique_mail';
	                $data = [
	                    'data' => $procedureInfos,
	                    
	                ];

					
	                  $agent_traitant = user_forestier_id($AInfo->id_agent_emission) ; 
	                  $usager = user_usager_id($procedureInfos->id_usager) ;
					 
	                  if($usager != null)
	                    {
							
	                         $destinataires = $usager->email;
	                         $data['prenom'] = $usager->firstname;
	                         $data['nom'] = $usager->name;
	                         $data['nom_dest'] = $usager->name;
	                         $data['prenom_dest'] = $usager->firstname;
	                         $data['agent_traitant'] = $agent_traitant->firstname.' '.$agent_traitant->name;
	                         $data['date'] = $AInfo->date_avis_technique;
	                         $data['titre'] = "L'avis technique de votre procédure ".$procedureInfos->numero." vient d'être délivré.";
	                         $data['nature'] = "OBTENTION D'AVIS TECHNIQUE";
	                         $data['id'] = $id;
	                         $data['debut_validite'] = $AInfo->debut_validite;
	                         $data['fin_validite'] = $AInfo->fin_validite;
	                         $sujet = "OBTENTION D'AVIS TECHNIQUE";
	                        // $data['check_route'] = "Route('process_show',$procedureInfos->id)";

	                        
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
							 
							
	                    }
						

	                $view_url = 'emails.creation_avis_techique_mail2';
					$posteModel = new Poste();
					$dgefc =  $posteModel->getPosteDgefcUsers(107);
					
					if($dgefc!= null)
	                foreach ($dgefc as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
					  
	                  if($user != null)
	                    {
						
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $data['nom_usager'] = $usager->name;
	                         $data['prenom_usager'] = $usager->firstname;
							 $data['titre'] = "L'avis technique de la procédure ".$procedureInfos->numero."  vient d'être délivré. Et la procédure est en attente du Visa";
	                         $data['nature'] = "AVIS TECHNIQUE DELIVRE";
	                         $data['id'] = $AInfo->id;
	                         $data['debut_validite'] = $AInfo->debut_validite;
	                         $data['fin_validite'] = $AInfo->fin_validite;
	                         $sujet = "OBTENTION D'AVIS TECHNIQUE";
	                        // $data['check_route'] = "route('show.avis_delivre', $AInfo->id)";

	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }

	              
	        }
			}

	}



//AVIS TACHNIQUE

	if(!function_exists('notificationVISAATObtenu')){
		
		function notificationVISAATObtenu($id, $id_visa){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id)->first();

	     
			if($procedureInfos)
	        {
				
	             $VisaInfo = Visa::where('id', $id_visa)->first();
	             $AInfo = AvisTechnique::where('id_procedure_exportation', $id)->first();
	             $view_url = 'emails.creation_avis_techique_mail';
	                $data = [
	                    'data' => $procedureInfos,
	                    'viser' => 1,
	                ];

					
	                  $agent_traitant = user_by_id($VisaInfo->autorite) ; 
	                  $usager = user_usager_id($procedureInfos->id_usager) ;
					 
	                  if($usager != null)
	                    {
							
	                         $destinataires = $usager->email;
	                         $data['prenom'] = $usager->firstname;
	                         $data['nom'] = $usager->name;
	                         $data['nom_dest'] = $usager->name;
	                         $data['prenom_dest'] = $usager->firstname;
	                         $data['agent_traitant'] = $agent_traitant->firstname.' '.$agent_traitant->name;
	                         $data['date'] = $AInfo->date_avis_technique;
	                         $data['titre'] = "Le visa est apposé sur l'avis technique de votre procédure ".$procedureInfos->numero;
	                         $data['nature'] = "OBTENTION DU VISA SUR L'AVIS TECHNIQUE";
	                         $data['id'] = $id;
	                         $data['debut_validite'] = $AInfo->debut_validite;
	                         $data['fin_validite'] = $AInfo->fin_validite;
	                         $sujet = "OBTENTION DU VISA SUR L'AVIS TECHNIQUE";
	                         

	                        
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
							 
							
	                    }
						

	                $view_url = 'emails.creation_avis_techique_mail2';
					$posteModel = new Poste();
					$dgefc =  $posteModel->getPosteIntervenant(300);
					
					if($dgefc!= null)
	                foreach ($dgefc as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
					  
	                  if($user != null)
	                    {
						
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $data['nom_usager'] = $usager->name;
	                         $data['prenom_usager'] = $usager->firstname;
							 $data['titre'] = "Le visa de l'avis technique de la procédure ".$procedureInfos->numero."  vient d'être apposé. La procédure est en attente de scanning";
	                         $data['nature'] = "OBTENTION DU VISA SUR L'AVIS TECHNIQUE";
	                         $data['id'] = $id;
	                         $data['debut_validite'] = $AInfo->debut_validite;
	                         $data['fin_validite'] = $AInfo->fin_validite;
	                         $sujet = "OBTENTION DU VISA SUR L'AVIS TECHNIQUE";
	                       

	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }



	                $dgefc =  $posteModel->getPosteIntervenant(200);
					if($dgefc!= null)
	                foreach ($dgefc as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
					  
	                  if($user != null)
	                    {
						
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
	                         $data['nom_usager'] = $usager->name;
	                         $data['prenom_usager'] = $usager->firstname;
							 $data['titre'] = "Le visa de l'avis technique de la procédure ".$procedureInfos->numero."  vient d'être apposé. La procédure est en attente du BFU";
	                         $data['nature'] = "OBTENTION DU VISA SUR L'AVIS TECHNIQUE";
	                         $data['id'] = $AInfo->id;
	                         $data['debut_validite'] = $AInfo->debut_validite;
	                         $data['fin_validite'] = $AInfo->fin_validite;
	                         $sujet = "OBTENTION DU VISA SUR L'AVIS TECHNIQUE";
	                       

	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }

	              
	        }
			}

	}

	//AVIS rejet TACHNIQUE

	if(!function_exists('notificationVISAATRejete')){
		
		function notificationVISAATRejete($id, $id_agent){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id)->first();

	     
			if($procedureInfos)
	        {
				
	             $AInfo = AvisTechnique::where('id_procedure_exportation', $procedureInfos->id)->first();
	             $view_url = 'emails.creation_avis_techique_mail';
	                $data = [
	                    'data' => $procedureInfos,
	                    
	                ];

					
	                  $agent_traitant = user_by_id($id_agent) ; 
	                  $usager = user_usager_id($procedureInfos->id_usager) ;
					 
	                  if($usager != null)
	                    {
							
	                         $destinataires = $usager->email;
	                         $data['prenom'] = $usager->firstname;
	                         $data['nom'] = $usager->name;
	                         $data['nom_dest'] = $usager->name;
	                         $data['prenom_dest'] = $usager->firstname;
	                         $data['agent_traitant'] = $agent_traitant->firstname.' '.$agent_traitant->name;
	                         $data['date'] = $AInfo->date_avis_technique;
	                         $data['titre'] = "L'apposition du visa sur l'avis technique de votre procédure ".$procedureInfos->numero." vient d'être rejetée.";
	                         $data['nature'] = "REJET D'APPOSITION DU VISA SUR L'AVIS TECHNIQUE";
	                         $data['id'] = $id;
	                         $data['debut_validite'] = $AInfo->debut_validite;
	                         $data['fin_validite'] = $AInfo->fin_validite;
	                         $sujet = "REJET D'APPOSITION DU VISA SUR L'AVIS TECHNIQUE";
	                        // $data['check_route'] = "Route('process_show',$procedureInfos->id)";

	                        
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
							 
							
	                    }
						

	              
	        }
			}

	}


if(!function_exists('notificationExtensionAT')){
		
		function notificationExtensionAT($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id)->first();

	     
			if($procedureInfos)
	        {
				
	             $AInfo = AvisTechnique::where('id_procedure_exportation', $procedureInfos->id)->first();
	             $view_url = 'emails.extension_avis_technique_mail';
	                $data = [
	                    'data' => $procedureInfos,
	                ];

					
	                  $agent_traitant = user_forestier_id($AInfo->id_agent_emission) ; 
	                  $usager = user_usager_id($procedureInfos->id_usager) ;
					 
	                  if($usager != null)
	                    {
							
	                         $destinataires = $usager->email;
	                         $data['prenom'] = $usager->firstname;
	                         $data['nom'] = $usager->name;
	                         $data['agent_traitant'] = $agent_traitant->firstname.' '.$agent_traitant->name;
	                         $data['date'] = $AInfo->date_avis_technique;
	                         $data['titre'] = "L'avis technique de votre procédure vient d'être délivré.";
	                         $data['nature'] = "Fin de validité d'avis technique étendue";
	                         $data['id'] = $AInfo->id;
	                         $data['debut_validite'] = $AInfo->debut_validite;
	                         $data['fin_validite'] = $AInfo->fin_validite;
	                         $data['fin_validite_etendue'] = $AInfo->fin_validite_etendue;
	                         $sujet = "EXTENSION D'AVIS TECHNIQUE";

	                         mail_send($view_url,  $data, [$destinataires], $sujet);
							
	                    }
						

	                $view_url = 'emails.extension_avis_technique_mail';
					$posteModel = new Poste();
					$dgefc =  $posteModel->getPosteDgefcUsers(107);
					if($dgefc!= null)
	                foreach ($dgefc as $auth_id) {
	                  $user =user_by_id($auth_id) ;
					  
	                  if($user != null)
	                    {
						
	                        $destinataires = $user->email;
	                         $data['prenom'] = $user->name;
	                         $data['nom'] = $user->firstname;
							 $data['titre'] = "L'avis technique de la procédure vient d'être délivré.";
	                         $data['nature'] = "Fin de validité d'avis technique étendue";
	                         $data['id'] = $AInfo->id;
	                         $data['debut_validite'] = $AInfo->debut_validite;
	                         $data['fin_validite'] = $AInfo->fin_validite;
	                         $data['fin_validite_etendue'] = $AInfo->fin_validite_etendue;
	                         $sujet = "EXTENSION D'AVIS TECHNIQUE";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }

	              
	        }
			}

	}


	if(!function_exists('notificationRejetAT')){
		
		function notificationRejetAT($id){
			$modelProcedure = new ProcedureExportation();
			$procedureInfos = $modelProcedure->get_procedure_exportation_all_info_by_id($id);
	        if($procedureInfos)
	        {
	            $rejetInfo = RejetProcedureExportation::where('id_procedure_exportation', $id)->first();

	              //  if($rejetInfo)
	                  //  $rejetInfo = $rejetInfo[0];



	              $view_url = 'emails.rejet_avis_technique';
	                $data = [
	                    'data' => $procedureInfos[0],
	                ];

	              
	                  $agent_traitant = User::where('id',$rejetInfo->id_agent_traitant)->first() ;
	                  $usager = user_usager_id($procedureInfos[0]->id_usager) ;
	                  if($usager != null)
	                    {
	                        $destinataires = $usager->email;
	                         $data['id'] = $procedureInfos[0]->id;
	                         $data['prenom'] = $usager->name;
	                         $data['nom'] = $usager->firstname;
	                         $data['agent_traitant'] = $agent_traitant->name.' '.$agent_traitant->firstname;
	                         $data['date_rejet'] = $rejetInfo->date_rejet;
	                         $data['raison'] = $rejetInfo->raison_rejet;
	                         $sujet = "REJET DE LA DEMANDE D'AVIS TECHNIQUE";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }

	                $view_url = 'emails.rejet_avis_technique';
					$posteModel = new Poste();
					$dgefc =  $posteModel->getPosteDgefcUsers(107);
					if($dgefc!= null)
	                foreach ($dgefc as $auth_id) {
	                  $user =user_by_id($auth_id->id_user) ;
	                  if($user != null)
	                    {
						
	                        $destinataires = $user->email;
	                        $data['id'] = $procedureInfos[0]->id;
	                         $data['prenom'] = $usager->name;
	                         $data['nom'] = $usager->firstname;
	                         $data['agent_traitant'] = $agent_traitant->name.' '.$agent_traitant->firstname;
	                         $data['date_rejet'] = $rejetInfo->date_rejet;
	                         $data['raison'] = $rejetInfo->raison_rejet;
	                         $sujet = "REJET DE LA DEMANDE D'AVIS TECHNIQUE";
	                         mail_send($view_url,  $data, [$destinataires], $sujet);
	                    }
	                    	                 
	                }

	        }     

		}
	}

	
?>