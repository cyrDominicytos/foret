<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    //dd(route('backpack.dashboard'));
//    return view('index');
//})->name('acceuil');

Route::get('/', 'HomeController@acceuil')->name('acceuil');
Route::get('/compte/activation/{id}/{code}/{email}', 'Auth\activationController@show')->name('compte.activation');
Route::post('/compte/activate', 'Auth\activationController@activate')->name('compte.activate');
Route::get('/apropos', 'HomeController@apropos')->name('apropos');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::get('/testmail', 'TestController@testMail');
Route::get('/test', 'TestController@test');


//Route::impersonate();   https://github.com/404labfr/laravel-impersonate
//Auth::routes();

Auth::routes(['register' => true, 'verify' => true]);


Route::middleware(['auth','verified'])->group(function () {

//profile    
Route::get('/profile', 'Auth\ProfileController@edit')->name('profile.edit');  
Route::post('/profile', 'Auth\ProfileController@update')->name('profile.update');  
    
Route::get('/home', 'HomeController@index')->name('home');

//Process
Route::get('/process/{details}', 'Procedure\ProcedureController@liste')->name('process');
Route::get('/nouvelle_procedure', 'Procedure\ProcedureController@nouvelle_procedure')->name('nouvelle_procedure'); 
Route::get('/nouvelle_procedures/{update}', 'Procedure\ProcedureController@nouvelle_procedure')->name('nouvelle_procedures'); 
Route::get('/process_show/{show}', 'Procedure\ProcedureController@show')->name('process_show');

Route::post('/process_create', 'Procedure\ProcedureController@create')->name('process.create');
Route::post('/process_update', 'Procedure\ProcedureController@update')->name('process.update'); 

Route::post('ajaxRequest', 'Usager\UsagerController@buildProduct')->name('ajaxRequest.post');


//Scanning
Route::get('/scanning/{details}', 'Scanning\ScanningController@liste')->name('scanning');
Route::get('/scan_form/{update}', 'Scanning\ScanningController@scan_form')->name('scan_form'); 
Route::post('/scan_create', 'Scanning\ScanningController@create')->name('scan.create');
Route::post('/scan_update', 'Scanning\ScanningController@update')->name('scan.update'); 


//Vgm 
Route::get('/vgm/{details}', 'Vgm\VgmController@liste')->name('vgm');
Route::get('/joindre_vgm/{update}', 'Vgm\VgmController@joindre_vgm')->name('joindre_vgm'); 
Route::post('/save_vgm', 'Vgm\VgmController@save_vgm')->name('vgm.save_vgm'); 


//Bfu 
Route::get('/bfu/{details}', 'Bfu\BfuController@liste')->name('bfu');
Route::get('/joindre_bfu/{update}', 'Bfu\BfuController@joindre_bfu')->name('joindre_bfu'); 
Route::get('/regle_bfu/{update}', 'Bfu\BfuController@regle_bfu')->name('regle_bfu'); 
Route::post('/save_bfu', 'Bfu\BfuController@save_bfu')->name('bfu.save_bfu'); 
Route::post('/save_bfu_regle', 'Bfu\BfuController@save_bfu_regle')->name('bfu.save_bfu_regle'); 


//Liquidation 
Route::get('/liquidation/{details}', 'Liquidation\LiquidationController@liste')->name('liquidation');
Route::get('/liquider/{update}', 'Liquidation\LiquidationController@liquider')->name('liquider'); 
Route::post('/save_liquidation', 'Liquidation\LiquidationController@save_bfu')->name('liquidation.save_liquidation');
Route::post('/close_process', 'Liquidation\LiquidationController@close')->name('liquidation.fermer'); 
 



//Demande
Route::get('/demandes/{details}', 'Demande\DemandeController@liste')->name('demandes');
Route::get('/nouvelle_demande', 'Demande\DemandeController@nouvelle_demande')->name('nouvelle_demande');
Route::get('/nouvelle_demandes/{update}', 'Demande\DemandeController@nouvelle_demande')->name('nouvelle_demandes');
Route::get('/demande_show/{show}', 'Demande\DemandeController@show')->name('demande_show');

Route::post('/demande_create', 'Demande\DemandeController@create')->name('demande.create'); 
Route::post('/demande_update', 'Demande\DemandeController@update')->name('demande.update'); 

//Laissez-passer
Route::get('/laissez_passer/attente/emission/{laisser_passer_attente}', 'Laissez_passer\LaissezpasserController@show_en_attente')->name('show.en_attente');

Route::get('/laissez_passer/attente/{lp_attente}', 'Laissez_passer\LaissezpasserController@show_details_en_attente')->name('show.en_attente_det');

Route::get('/laissez_passer/attente', 'Laissez_passer\LaissezpasserController@liste_en_attente')->name('liste.en_attente');

Route::get('/laissez_passer/delivres', 'Laissez_passer\LaissezpasserController@liste_delivres')->name('liste.delivres');

Route::post('laissez_passer/attente', 'Laissez_passer\LaissezpasserController@store_procedure_en_attente')->name('laissez_passer_attente.store');

Route::get('/laissez_passer/delivres/{id_laissez_passer}}', 'Laissez_passer\LaissezpasserController@show_delivre')->name('show.delivre');

Route::get('/demande_laissez_passer/rejets', 'Laissez_passer\LaissezpasserController@liste_demande_rejet')->name('liste.rejets');

Route::get('/demande_laissez_passer/a_etendre', 'Laissez_passer\LaissezpasserController@liste_a_etendre')->name('liste.etendre');

Route::get('/demande_laissez_passer/rejet/{demande_rejet}', 'Laissez_passer\LaissezpasserController@show_demande_rejet')->name('show.demande_LP_rejet');

Route::post('laissez_passer/etendre', 'Laissez_passer\LaissezpasserController@update_fin_validite')->name('laissez_passer_attente.store');


Route::get('/LP/{id}', 'PDFController@generateLP')->name('LP');
// Route::get('/LPT/{id}', 'PDFController@generateLPT')->name('LPT');


//Constats de conformités

Route::get('/constat_conformite/attente', 'Constat_conformite\ConstatconformiteController@liste_en_attente_constat')->name('liste.en_attente_constat');

Route::get('/constat_conformite/delivres', 'Constat_conformite\ConstatconformiteController@liste_delivres_constat')->name('liste.delivres_constat');

Route::get('/constat_conformite/rejete', 'Constat_conformite\ConstatconformiteController@liste_rejete_constat')->name('liste.constat_rejete');


Route::post('/constat_conformite/store', 'Constat_conformite\ConstatconformiteController@store_procedure_en_attente_constat')->name('store.constat_conformite');

Route::get('/constat_conformite/delivres/details/{id_procedure}', 'Constat_conformite\ConstatconformiteController@show_delivre_constat')->name('show.delivre_constat');

Route::get('/constat_conformite/traiter/attente/{id_procedure}', 'Constat_conformite\ConstatconformiteController@show_traiter_constat')->name('show.traiter_constat');

Route::get('/constat_conformite/details/attente/{id_procedure}', 'Constat_conformite\ConstatconformiteController@show_en_attente_constat')->name('show.en_attente_constat');

Route::get('/constat_conformite/details/rejete/{id_procedure}', 'Constat_conformite\ConstatconformiteController@show_constat_rejete')->name('show.constat_rejete');


//Contre constats de conformités

Route::get('/contre_constat/attente', 'Contre_constat\ContreconstatController@liste_en_attente_contre_constat')->name('liste.en_attente_contre_constat');

Route::get('/contre_constat/delivres', 'Contre_constat\ContreconstatController@liste_delivres_contre_constat')->name('liste.delivres_contre_constat');

Route::get('/contre_constat/rejete', 'Contre_constat\ContreconstatController@liste_rejete_contre_constat')->name('liste.contre_constat_rejete');


Route::post('/contre_constat/store', 'Contre_constat\ContreconstatController@store_procedure_en_attente_contre_constat')->name('store.contre_constat_conformite');

Route::get('/contre_constat/delivres/details/{id_procedure}', 'Contre_constat\ContreconstatController@show_delivre_contre_constat')->name('show.delivre_contre_constat');

Route::get('/contre_constat/details/attente/{id_procedure}', 'Contre_constat\ContreconstatController@show_en_attente_contre_constat')->name('show.en_attente_contre_constat');

Route::get('/contre_constat/traiter/attente/{id_procedure}', 'Contre_constat\ContreconstatController@show_en_attente_contre_constat_traiter')->name('show.en_attente_contre_constat_traiter');

Route::get('/contre_constat/details/rejete/{id_procedure}', 'Contre_constat\ContreconstatController@show_contre_constat_rejete')->name('show.contre_constat_rejete');

//Etat de versement
Route::get('/etat_versement/delivres', 'Etat_versement\EtatversementController@liste_etat_delivres')->name('liste_versement.delivres');
Route::get('/etat_versement/en_attente', 'Etat_versement\EtatversementController@liste_etat_en_attente')->name('liste_versement.attente');
Route::get('/etat_versement/delivres/{etats_id}', 'Etat_versement\EtatversementController@show_details_etat_delivre')->name('show.etat_delivre');
Route::get('/etat_versement/attente/{etats_id}', 'Etat_versement\EtatversementController@show_detail_avant_delivrance')->name('show.etat_attente');
Route::get('/etat_versement/details/attente/{id}', 'Etat_versement\EtatversementController@show_det_en_attente')->name('show.detail_en_attente');
Route::post('etat_versement/delivrance', 'Etat_versement\EtatversementController@store_procedure_en_attente_etat')->name('etat_versement.store');

//Etat Cyr
Route::post('/etat_save_regle', 'Etat_versement\Etatversement2Controller@save_regle')->name('etat.save_regle');
Route::post('/etat_print', 'Etat_versement\Etatversement2Controller@etat_print')->name('etat.print');
Route::get('/regle_etat_versement/{update}', 'Etat_versement\Etatversement2Controller@regle_etat_versement')->name('regle_etat_versement');
Route::get('/etat_show/{update}', 'Etat_versement\Etatversement2Controller@show_etat_versement')->name('etat_show');
Route::get('/etat_show_details/{update}', 'Etat_versement\Etatversement2Controller@etat_show_details')->name('etat_show_details');
Route::get('/etat_versement_non_regle', 'Etat_versement\Etatversement2Controller@etat_non_regle')->name('liste_versement.non_regle');
Route::get('/etat_versement_regle', 'Etat_versement\Etatversement2Controller@etat_regle')->name('liste_versement.regle');

// Avis technique
Route::get('/avis_technique/delivres', 'Avis_technique\AvistechniqueController@liste_avis_delivres')->name('liste_avis.delivres');

Route::get('/avis_technique/delivres/{id}', 'Avis_technique\AvistechniqueController@show_details_avis_delivre')->name('show.avis_delivre');

Route::get('/avis_technique/attente/{avis}', 'Avis_technique\AvistechniqueController@show_avis_en_attente')->name('show.avis_en_attente');

Route::get('/avis_technique/details/attente/{avis}', 'Avis_technique\AvistechniqueController@show_details_avis_attente')->name('show.detail_avis_en_attente');

Route::get('/avis_technique/en_attente', 'Avis_technique\AvistechniqueController@liste_avis_en_attente')->name('liste_avis.attente');

Route::post('avis_technique/attente', 'Avis_technique\AvistechniqueController@store_procedure_en_attente_avis')->name('avis_technique_attente.store');

Route::post('avis_technique/etendre', 'Avis_technique\AvistechniqueController@update_fin_validite_avis')->name('avis_technique_attente.store');

Route::get('/avis_technique/rejets', 'Avis_technique\AvistechniqueController@liste_demande_avis_rejet')->name('liste_avis.rejet');

Route::get('/demande_avis_technique/rejet/{dem_rejet}', 'Avis_technique\AvistechniqueController@show_demande_avis_rejet')->name('show.demande_AT_rejet');

Route::post('avis_technique/etendre', 'Avis_technique\AvistechniqueController@update_fin_validite_avis')->name('avis_technique_etendre.store');

Route::get('/avis_technique/etendre', 'Avis_technique\AvistechniqueController@liste_a_etendre_avis')->name('liste_avis.etendre');


//Visa Avis Technique

Route::get('/visa/attente', 'Bfsp\BfspController@liste_en_attente_visa')->name('liste.en_attente_visa');

Route::get('/visa/delivres', 'Bfsp\BfspController@liste_delivres_visa')->name('liste.delivres_visa');

Route::get('/visa/rejete', 'Bfsp\BfspController@liste_rejete_visa')->name('liste.visa_rejete');


Route::post('/visa/store', 'Bfsp\BfspController@store_procedure_en_attente_visa')->name('store.visa');

Route::get('/visa/delivres/details/{id_procedure}', 'Bfsp\BfspController@show_delivre_visa')->name('show.delivre_visa');

Route::get('/visa/details/attente/{id_procedure}', 'Bfsp\BfspController@show_en_attente_visa')->name('show.en_attente_visa');

Route::get('/visa/traiter/attente/{id_procedure}', 'Bfsp\BfspController@show_en_attente_visa_traiter')->name('show.en_attente_visa_traiter');

Route::get('/visa/details/rejete/{id_procedure}', 'Bfsp\BfspController@show_visa_rejete')->name('show.visa_rejete');



//Query route
//Route::get('/demande_annuelle', 'Usager\UsagerController@new')->name('demande_annuelle');

Route::get('/dynamic_dependent', 'Dynamic\DynamicController@index');
Route::post('dynamic_dependent/typeProduit', 'Dynamic\DynamicController@typeProduit')->name('dynamicdepdendent.typeProduit');
Route::post('dynamic_dependent/communeDepartementEmpotage', 'Dynamic\DynamicController@communeDepartementEmpotage')->name('dynamicdepdendent.communeDepartementEmpotage');
Route::post('dynamic_dependent/communeDepartementProvenance', 'Dynamic\DynamicController@communeDepartementProvenance')->name('dynamicdepdendent.communeDepartementProvenance');
Route::post('dynamic_dependent/posteCommuneEmpotage', 'Dynamic\DynamicController@posteCommuneEmpotage')->name('dynamicdepdendent.posteCommuneEmpotage');

   

    
    
     Route::get('/CC', 'PDFController@generateCC')->name('CC');
     Route::get('/AT', 'PDFController@generateAT')->name('AT');
     Route::get('/BS', 'PDFController@generateBS')->name('BS');
     Route::get('/pdf', 'PDFController@generatePDF2')->name('pdf');
     Route::get('/pdf2/{show}', 'PDFController@generateDemandeAnnuelle')->name('pdf2');




});


