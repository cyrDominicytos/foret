<?php

namespace App\Http\Controllers\Avis_technique;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProcedureExportation;
use App\Models\LaissezPasser;
use App\Models\CaracteristiqueProduitProcedureExportation;
use App\Models\Parametre;
use App\Models\RejetProcedureExportation;
use App\Models\EtatVersement;
use App\Models\AvisTechnique;
use \Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;

class AvistechniqueController extends Controller
{

public $modelEtatVersement = null;
public $modelCaracProdExportation = null;
public $modelProcedureExport = null;
public $modelLaissezpasser = null;
public $modelAvisTechnique = null;
public $modelRejet = null;
protected $home =null; 

/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/

function __construct(){
$this->modelAvisTechnique = new AvisTechnique();
$this->modelProcedureExport = new ProcedureExportation();
$this->modelEtatVersement = new EtatVersement();
$this->modelCaracProdExportation = new CaracteristiqueProduitProcedureExportation();
$this->modelLaissezpasser = new LaissezPasser();
$this->modelRejet = new RejetProcedureExportation();
$this->home = new HomeController();

}

public function index()
{
//
}

public function liste_avis_delivres(){
     session(['back' => Route('liste_avis.delivres')]);

$avis_delivres = $this->modelAvisTechnique->get_avis_techniques_all_info(forestier_user_id(Auth::user()->id)->id_poste);

return view('/avis_technique/liste_avis_technique_delivres', compact('avis_delivres'));

}

public function show_details_avis_delivre($id){
$avis_techniques = AvisTechnique::where('id',$id)->first();


$procedureDetails = $this->modelProcedureExport->get_procedure_exportation_all_info_by_id_for_poste($avis_techniques->id_procedure_exportation, forestier_user_id(Auth::user()->id)->id_poste)->first();


if($avis_techniques != null){
$caracteristiques = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($avis_techniques->id_procedure_exportation);


return view('avis_technique/details_avis_technique', compact('procedureDetails', 'caracteristiques'));

}else{

return redirect(route('liste_avis.delivres'))->with('error', "L'avis technique auquel vous essayez d'accéder n'existe pas");

}

}

public function liste_avis_en_attente(){
     session(['back' =>  Route('liste_avis.attente')]);

$avis_attentes = $this->modelProcedureExport->get_procedure_exportation_all_info_by_statut_for_poste(6, forestier_user_id(Auth::user()->id)->id_poste);

return view('/avis_technique/avis_technique_en_attente', compact('avis_attentes'));
}


public function show_avis_en_attente($id){

$procedureEnAttentesDetails = $this->modelProcedureExport->get_procedure_exportation_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();


if($procedureEnAttentesDetails != null){
$caracteristiques = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);
$delaiValidite = Parametre::where('code','délai_avis_technique')->first();
$et = EtatVersement::where('id_procedure_exportation',$id)->first();
$donnees = $this->modelEtatVersement->get_etat_versements_all_info_by_id_for_poste($et->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

return view('/avis_technique/details_emission_avis_tech', compact('procedureEnAttentesDetails', 'caracteristiques', 'delaiValidite', 'donnees'));



}else{

$av = 1;
$id_av = AvisTechnique::where('id',$id)->first();
$procedureEnAttentesDetails = $this->modelProcedureExport->get_procedure_exportation_all_info_by_id_for_poste($id_procedure,forestier_user_id(Auth::user()->id)->id_poste)->first();

if($procedureEnAttentesDetails != null){

$caracteristiques = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id_av->id_procedure_exportation);
$delaiValidite = Parametre::where('code','délai_avis_technique')->first();

$donnees = $this->modelEtatVersement->get_etat_versements_all_info_by_id_for_poste($et->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

return view('/avis_technique/details_emission_avis_tech', compact('procedureEnAttentesDetails', 'caracteristiques','delaiValidite', 'av', 'donnees'));
}else{
return redirect(route('show.avis_en_attente'))->with('error', "La demande à laquelle vous essayez d'éccéder n'existe pas");
}

}
}


public function show_details_avis_attente($id){

$procedureEnAttentesDetails = $this->modelAvisTechnique->get_avis_techniques_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

$id_et = EtatVersement::where('id_procedure_exportation',$id)->first();

$procedureEnAttentesDetails = $this->modelProcedureExport->get_procedure_exportation_all_info_by_id_for_poste($id,forestier_user_id(Auth::user()->id)->id_poste)->first();

if($procedureEnAttentesDetails != null){

$caracteristiques = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);

$donnees = $this->modelEtatVersement->get_etat_versements_all_info_by_id_for_poste($id_et->id,forestier_user_id(Auth::user()->id)->id_poste)->first();


return view('/avis_technique/details_avis_technique_en_attente', compact('procedureEnAttentesDetails', 'caracteristiques', 'donnees'));

}else{
return redirect(route('liste_avis.attente'))->with('error', "L'avis technique auquel vous essayez d'éccéder n'existe pas");
}


}



public function store_procedure_en_attente_avis(Request $request){

$last_id = AvisTechnique::max('id');
$raison = $request->reasonRejectAvis;

if($raison == null){


$data = [
"numero" => process_code_CIF($last_id + 1),
"id_procedure_exportation" => (int)$request->id_p,
"debut_validite" => $request->start_validity_avis,
"fin_validite" => $request->end_validity_avis,
"fin_validite_etendue" => date('Y-m-d'),
"id_agent_emission" => forestier_user_id(Auth::user()->id)->id,
"id_agent_extension" => forestier_user_id(Auth::user()->id)->id,
"observation" => "",
"date_avis_technique" => date('Y-m-d H:i:s')
];

$response = AvisTechnique::create($data);

if($response){

ProcedureExportation::where('id',(int)$response->id_procedure_exportation)->update(array('id_statut'=>7));
$caracteristiques = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($request->id_p);

$pdfControler = new PDFController();
$pdfControler->generateAT($response->id,$caracteristiques);

notificationATObtenu($request->id_p);
return redirect(route('liste_avis.delivres'))->with('success', "Avis technique délivré avec succès");

}

}else{
$data = [
"id_procedure_exportation" => (int)$request->id_p,
"id_statut_avant_rejet" => 6,
"id_statut_apres_rejet" => 1007,
"id_agent_traitant" => Auth::user()->id,
"raison_rejet" => $raison,
"date_rejet" => date('Y-m-d H:i:s')

];

$response = RejetProcedureExportation::create($data);
if($response){
//$last_id = AvisTechnique::max('id');
ProcedureExportation::where('id',(int)$request->id_p)->update(array('id_statut'=>1007));
notificationRejetAT($request->id_p);
return redirect(route('liste_avis.rejet'))->with('success', "Demande d'avis technique rejeté avec succès");
}
}

}

public function liste_demande_avis_rejet(){
 session(['back' => Route('liste_avis.rejet')]);

$detailsDemandeRejets = $this->modelRejet->get_procedure_rejeter_statut_apres_for_poste(1007,forestier_user_id(Auth::user()->id)->id_poste);

return view('/avis_technique/liste_demande_avis_rejet', compact('detailsDemandeRejets'));

}


public function show_demande_avis_rejet($id){

$id_procedure_for_rejet = RejetProcedureExportation::where('id',$id)->first()->id_procedure_exportation;

$id_et = EtatVersement::where('id_procedure_exportation',$id)->first();

$procedureEnAttentesDetails = $this->modelProcedureExport->get_procedure_exportation_all_info_by_id_for_poste($id_procedure_for_rejet,forestier_user_id(Auth::user()->id)->id_poste)->first();

if($procedureEnAttentesDetails != null){

$caracteristiques = $this->modelCaracProdExportation->get_caracteristique_procedure_exportation_by_id($id);

$donnees = $this->modelEtatVersement->get_etat_versements_all_info_by_id_for_poste($id_et->id,forestier_user_id(Auth::user()->id)->id_poste)->first();

$delaiValidite = Parametre::where('code','délai_laissez_passer')->first();

$rejetInfos = $this->modelRejet->get_procedure_rejeter_by_id_for_poste($id_procedure_for_rejet,forestier_user_id(Auth::user()->id)->id_poste)->first();

user_forestier_id($rejetInfos->id_agent_traitant);

return view('/avis_technique/details_demande_avis_rejet', compact('procedureEnAttentesDetails', 'caracteristiques', 'delaiValidite', 'rejetInfos', 'donnees'));
}else{

return redirect(route('liste_avis.rejet'))->with('error', "La demande à laquelle vous essayez d'accéder n'existe pas");

}
}

public function liste_a_etendre_avis(){
  session(['back' => Route('liste_avis.etendre')]);

$extends = $this->modelAvisTechnique->get_avis_techniques_to_extend_by_id_for_poste(forestier_user_id(Auth::user()->id)->id_poste);

return view('/avis_technique/liste_avis_a_etendre', compact('extends'));
}


public function update_fin_validite_avis(Request $req){

$id_validity = $req->id_to_upd;



$avisAEtendre = AvisTechnique::where('id_procedure_exportation',$id_validity)->update(array('fin_validite_etendue'=>$req->end_validity_avis, 'id_agent_extension' => forestier_user_id(Auth::user()->id)->id));

notificationExtensionAT($id_validity);
return redirect(route('liste_avis.delivres'))->with('success', "Date de fin de validité étendue avec succès");

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
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
//
}

/**
* Display the specified resource.
*
* @param int $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
//
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