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
use App\Models\Document;
use \Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;


		class Etatversement2Controller extends Controller
		{

		public function index()
		{
		//
		}

		public function liste_etat_delivres(){
		return view('/etat_versement/liste_etat_verse_delivres');
		}

		/**
		* Show the form for creating a new resource.
		*
		* @return \Illuminate\Http\Response
		*/
		public function create()
		{

		}

		/**
		* Store a newly created resource in storage.
		*
		* @param \Illuminate\Http\Request $request
		* @return \Illuminate\Http\Response
		*/
		public function store(Request $request)
		{

		}

		/**
		* Display the specified resource.
		* @param int $id
		* @return \Illuminate\Http\Response
		*/
		public function show($id)
		{

		}

		public function show_etat_delivre($id){

		return view('/etat_versement/details_etat_versement');
		}

		public function etat_non_regle(){
		session(['back' => Route('liste_versement.non_regle')]);


		$data = [];
		$id_usager = usager_id_user(Auth::user()->id);
		$modelEtatVersement = new EtatVersement();
		$data['etat'] = $modelEtatVersement->get_etat_versement_non_regle_all_info_by_user($id_usager->id);
		//dd($id_usager->id);
		return view('/etat_versement/etat_versement_non_regle', $data);
		}

		public function etat_regle(){
		session(['back' => Route('liste_versement.regle') ]);


		$data = [];
		$id_usager = usager_id_user(Auth::user()->id);
		$modelEtatVersement = new EtatVersement();
		$data['etat'] = $modelEtatVersement->get_etat_versement_regle_all_info_by_user($id_usager->id);
		 return view('/etat_versement/etat_versement_regle', $data);
		}

		public function show_etat_versement($id=false){
		$data = [];
		$id_usager = usager_id_user(Auth::user()->id);
		$modelEtatVersement = new EtatVersement();
		$data['etat'] = $modelEtatVersement->get_etat_versement_all_info_by_user($id_usager->id) ;
		return view('/etat_versement/etat_versement_non_regle', $data);

		}
		public function etat_show_details($id=false){
		$data = [];
		//$process = new ProcedureExportation();
		$id_usager = usager_id_user(Auth::user()->id);
		$modelEtatVersement = new EtatVersement();
		if($id>0){
		
		if($id_usager)		
			$data['process'] = $modelEtatVersement->get_etat_versement_all_info_by_id_for_user($id,$id_usager->id);
		else
			$data['process'] = $modelEtatVersement->get_etat_versement_all_info_by_id($id);
	
		//dd(ProcedureExportation::where('id',$id)->get());
		//dd( $data['process'] );
		if($data['process']!= null && count($data['process']) >0 )
		{
		$data['process'] = $data['process'][0];
		$carateristique = new CaracteristiqueProduitProcedureExportation();
		$data['caracteristique'] = $carateristique->get_caracteristique_procedure_exportation_by_id($data['process']->id_procedure_exportation);
		if( count($data['caracteristique']) <= 0)
		$data['no_data_found'] = "Aucun produit ajouté à cette procédure";
		return view('/etat_versement/globale_vue_etat_versement', $data);
		}else{
		return redirect('/etat_versement_non_regle')->with('error', "L'état de versement auquel vous essayez d'acceder n'existe pas !" );
		}
		}else{
		return redirect('/regle_etat_versement')->with('error', "Accès non autorisé!" );
		}

		}

		public function etat_print(Request $request){

		}

		public function regle_etat_versement($id=false){

		$data = [];
		//$process = new ProcedureExportation();
		$id_usager = usager_id_user(Auth::user()->id);
		$modelEtatVersement = new EtatVersement();
		if($id>0){
		$data['process'] = $modelEtatVersement->get_etat_versement_all_info_by_id_for_user($id,$id_usager->id);

		//dd(ProcedureExportation::where('id',$id)->get());
		//dd( $data['process'] );
		if($data['process']!= null && count($data['process']) >0 )
		{
		$data['process'] = $data['process'][0];
		$carateristique = new CaracteristiqueProduitProcedureExportation();
		$data['caracteristique'] = $carateristique->get_caracteristique_procedure_exportation_by_id($data['process']->id_procedure_exportation);
		if( count($data['caracteristique']) <= 0)
			$data['no_data_found'] = "Aucun produit ajouté à cette procédure";
		return view('/etat_versement/vue_etat_versement', $data);
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
			$process = $modelEtatVersement->get_etat_versement_all_info_by_id_for_user($old_id,$id_usager->id)->first();
         if($process){
			if ($request->quittance!= null && $request->quittance->isValid())
			{
				$full_name = Auth::user()->firstname."_".Auth::user()->name;
				$file_path = "public/quittance/".date('Y')."/".Auth::user()->firstname."_".Auth::user()->name."/";
				$file_path2 = "quittance/".date('Y')."/".Auth::user()->firstname."_".Auth::user()->name."/";
				$file_path = perform_links($file_path);
				$file_extension= $request->quittance->getClientOriginalExtension();
				$pdf_name = perform_links2(perform_links('quittance_'.$process->numero."_".$full_name)).'.'.$file_extension;
				$request->quittance->storeAs($file_path,$pdf_name);

				//Procedure
				$updateData = [
							'numero_quittance' => $request->numero_quittance,
							'date_quittance' => $request->date_departs,
							'quittance_delivre_a' => $request->delivre_a,
							'nom_commissaire_agree' => $request->nom_commissaire_agree,
							'contact_commissaire_agree' => $request->contact_commissaire_agree,
							'date_reglement' => Carbon::now()
				];
				EtatVersement::where('id', $old_id)->update($updateData);
				ProcedureExportation::where('id', $process->id_procedure_exportation)->update(['id_statut' => 6]);
				$doc = new Document();
				$doc->nom_fichier =$pdf_name;
				$doc->nom_entite = 'etat_versements';
				$doc->entite_id = $process->id_procedure_exportation;
				$doc->chemin = $file_path2;
				$doc->id_categorie_document = 1;
				$doc->save();
				notificationReglementEtatVersement($old_id);
				return redirect('/etat_versement_regle')->with('success', "Quittance enregistrée avec succès !");

		}else{
			 return redirect('/etat_versement_non_regle')->with('error', "La quittance jointe n'a pas été bien transmise, veuillez réessayer !");
		}
		}else{
                    return redirect('/etat_versement_non_regle')->with('warning', "Action non autorisé !");
                }


		}

		/**
		* Show the form for editing the specified resource.
		*
		* @param int $id
		* @return \Illuminate\Http\Response
		*/
		public function edit($id)
		{
		//
		}

		/**
		* Update the specified resource in storage.
		*
		* @param \Illuminate\Http\Request $request
		* @param int $id
		* @return \Illuminate\Http\Response
		*/
		public function update(Request $request, $id)
		{
		//
		}

		/**
		* Remove the specified resource from storage.
		*
		* @param int $id
		* @return \Illuminate\Http\Response
		*/
		public function destroy($id)
		{
		//
		}
		}