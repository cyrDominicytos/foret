<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class RejetProcedureExportation extends AppModele
{

protected $fillable = [ 'id_procedure_exportation', 'id_statut_avant_rejet', 'id_statut_apres_rejet', 'id_agent_traitant', 'raison_rejet','date_rejet'];

    public function get_rejet_all_info() {
         return DB::table('rejet_procedure_exportations')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'rejet_procedure_exportations.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
		 ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')

         ->select(
         'rejet_procedure_exportations.id','rejet_procedure_exportations.id_procedure_exportation',
         'rejet_procedure_exportations.id_statut_avant_rejet',
         'rejet_procedure_exportations.id_statut_apres_rejet',
         'rejet_procedure_exportations.id_agent_traitant',
         'rejet_procedure_exportations.raison_rejet',
         'rejet_procedure_exportations.date_rejet',
         'rejet_procedure_exportations.created_at',
         'rejet_procedure_exportations.updated_at',


         'procedure_exportations.numero',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
       

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'demande_annuelles.demande_pour_annee as annee_demande',

         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'statut_procedure_exportations.id as statut_procedure', 
         'statut_procedure_exportations.code as code_procedure', 
         'statut_procedure_exportations.libelle as libelle_statut', 

         'gl_pays.id as id_pays', 
         'gl_pays.titre as titre_pays', 

         'departements.id as id_departement_provenance', 
         'departements.nom as nom_departement_provenance', 

         'communes.id as id_communes_provenance', 
         'communes.nom as nom_communes_provenance', 

         'users.name as nom_user', 
         'users.firstname as prenom_user', 
         'users.email as email_user', 
         'users.telephone as telephone_user', 
         'users.adresse as adresse_user',

         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'

     ) ->orderBy('rejet_procedure_exportations.created_at', 'DESC')
         ->get();
    }

public function get_rejet_all_info_for_poste($poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;

         return DB::table('rejet_procedure_exportations')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'rejet_procedure_exportations.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
       ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')

         ->select(
         'rejet_procedure_exportations.id','rejet_procedure_exportations.id_procedure_exportation',
         'rejet_procedure_exportations.id_statut_avant_rejet',
         'rejet_procedure_exportations.id_statut_apres_rejet',
         'rejet_procedure_exportations.id_agent_traitant',
         'rejet_procedure_exportations.raison_rejet',
         'rejet_procedure_exportations.date_rejet',
         'rejet_procedure_exportations.created_at',
         'rejet_procedure_exportations.updated_at',


         'procedure_exportations.numero',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
       

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'demande_annuelles.demande_pour_annee as annee_demande',

         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'statut_procedure_exportations.id as statut_procedure', 
         'statut_procedure_exportations.code as code_procedure', 
         'statut_procedure_exportations.libelle as libelle_statut', 

         'gl_pays.id as id_pays', 
         'gl_pays.titre as titre_pays', 

         'departements.id as id_departement_provenance', 
         'departements.nom as nom_departement_provenance', 

         'communes.id as id_communes_provenance', 
         'communes.nom as nom_communes_provenance', 

         'users.name as nom_user', 
         'users.firstname as prenom_user', 
         'users.email as email_user', 
         'users.telephone as telephone_user', 
         'users.adresse as adresse_user',

         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'

     )   ->whereIn('procedure_exportations.id_poste_forestier',  $poste_array) 
         ->orderBy('rejet_procedure_exportations.created_at', 'DESC')
         ->get();
    }


public function get_procedure_rejeter_statut_apres_for_poste($statut, $poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;

         return DB::table('rejet_procedure_exportations')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'rejet_procedure_exportations.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
         ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')

         ->select(
         'rejet_procedure_exportations.id','rejet_procedure_exportations.id_procedure_exportation',
         'rejet_procedure_exportations.id_statut_avant_rejet',
         'rejet_procedure_exportations.id_statut_apres_rejet',
         'rejet_procedure_exportations.id_agent_traitant',
         'rejet_procedure_exportations.raison_rejet',
         'rejet_procedure_exportations.date_rejet',
         'rejet_procedure_exportations.created_at',
         'rejet_procedure_exportations.updated_at',


         'procedure_exportations.numero',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
       

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'demande_annuelles.demande_pour_annee as annee_demande',

         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'statut_procedure_exportations.id as statut_procedure', 
         'statut_procedure_exportations.code as code_procedure', 
         'statut_procedure_exportations.libelle as libelle_statut', 

         'gl_pays.id as id_pays', 
         'gl_pays.titre as titre_pays', 

         'departements.id as id_departement_provenance', 
         'departements.nom as nom_departement_provenance', 

         'communes.id as id_communes_provenance', 
         'communes.nom as nom_communes_provenance', 

         'users.name as nom_user', 
         'users.firstname as prenom_user', 
         'users.email as email_user', 
         'users.telephone as telephone_user', 
         'users.adresse as adresse_user',

         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'

     )

         ->whereIn('procedure_exportations.id_poste_forestier',  $poste_array) 
         ->where('rejet_procedure_exportations.id_statut_apres_rejet',$statut) 
         ->where('procedure_exportations.id_statut',$statut) 
         ->orderBy('rejet_procedure_exportations.created_at', 'DESC')
         ->get();
    }


    public function get_procedure_rejeter_statut_avant_for_poste($statut,$poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;

         return DB::table('rejet_procedure_exportations')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'rejet_procedure_exportations.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
         ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')

         ->select(
         'rejet_procedure_exportations.id','rejet_procedure_exportations.id_procedure_exportation',
         'rejet_procedure_exportations.id_statut_avant_rejet',
         'rejet_procedure_exportations.id_statut_apres_rejet',
         'rejet_procedure_exportations.id_agent_traitant',
         'rejet_procedure_exportations.raison_rejet',
         'rejet_procedure_exportations.date_rejet',
         'rejet_procedure_exportations.created_at',
         'rejet_procedure_exportations.updated_at',


         'procedure_exportations.numero',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
       

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'demande_annuelles.demande_pour_annee as annee_demande',

         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'statut_procedure_exportations.id as statut_procedure', 
         'statut_procedure_exportations.code as code_procedure', 
         'statut_procedure_exportations.libelle as libelle_statut', 

         'gl_pays.id as id_pays', 
         'gl_pays.titre as titre_pays', 

         'departements.id as id_departement_provenance', 
         'departements.nom as nom_departement_provenance', 

         'communes.id as id_communes_provenance', 
         'communes.nom as nom_communes_provenance', 

         'users.name as nom_user', 
         'users.firstname as prenom_user', 
         'users.email as email_user', 
         'users.telephone as telephone_user', 
         'users.adresse as adresse_user',

         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'
     )
         ->whereIn('procedure_exportations.id_poste_forestier',  $poste_array) 
         ->where('rejet_procedure_exportations.id_statut_avant_rejet',$statut) 
         ->orderBy('rejet_procedure_exportations.created_at', 'DESC')
         ->get();
    }


     public function get_procedure_rejeter_by_id($id) {
         return DB::table('rejet_procedure_exportations')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'rejet_procedure_exportations.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
         ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')

         ->select(
         'rejet_procedure_exportations.id','rejet_procedure_exportations.id_procedure_exportation',
         'rejet_procedure_exportations.id_statut_avant_rejet',
         'rejet_procedure_exportations.id_statut_apres_rejet',
         'rejet_procedure_exportations.id_agent_traitant',
         'rejet_procedure_exportations.raison_rejet',
         'rejet_procedure_exportations.date_rejet',
         'rejet_procedure_exportations.created_at',
         'rejet_procedure_exportations.updated_at',


         'procedure_exportations.numero',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
       

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'demande_annuelles.demande_pour_annee as annee_demande',

         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'statut_procedure_exportations.id as statut_procedure', 
         'statut_procedure_exportations.code as code_procedure', 
         'statut_procedure_exportations.libelle as libelle_statut', 

         'gl_pays.id as id_pays', 
         'gl_pays.titre as titre_pays', 

         'departements.id as id_departement_provenance', 
         'departements.nom as nom_departement_provenance', 

         'communes.id as id_communes_provenance', 
         'communes.nom as nom_communes_provenance', 

         'users.name as nom_user', 
         'users.firstname as prenom_user', 
         'users.email as email_user', 
         'users.telephone as telephone_user', 
         'users.adresse as adresse_user',

         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'
     )

          ->where('rejet_procedure_exportations.id_procedure_exportation',$id) 
         ->orderBy('rejet_procedure_exportations.created_at', 'DESC')
         ->get();
    }

    public function get_procedure_rejeter_by_id_for_poste($id,$poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;

         return DB::table('rejet_procedure_exportations')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'rejet_procedure_exportations.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
         ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')

         ->select(
         'rejet_procedure_exportations.id','rejet_procedure_exportations.id_procedure_exportation',
         'rejet_procedure_exportations.id_statut_avant_rejet',
         'rejet_procedure_exportations.id_statut_apres_rejet',
         'rejet_procedure_exportations.id_agent_traitant',
         'rejet_procedure_exportations.raison_rejet',
         'rejet_procedure_exportations.date_rejet',
         'rejet_procedure_exportations.created_at',
         'rejet_procedure_exportations.updated_at',


         'procedure_exportations.numero',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
       

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'demande_annuelles.demande_pour_annee as annee_demande',

         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'statut_procedure_exportations.id as statut_procedure', 
         'statut_procedure_exportations.code as code_procedure', 
         'statut_procedure_exportations.libelle as libelle_statut', 

         'gl_pays.id as id_pays', 
         'gl_pays.titre as titre_pays', 

         'departements.id as id_departement_provenance', 
         'departements.nom as nom_departement_provenance', 

         'communes.id as id_communes_provenance', 
         'communes.nom as nom_communes_provenance', 

         'users.name as nom_user', 
         'users.firstname as prenom_user', 
         'users.email as email_user', 
         'users.telephone as telephone_user', 
         'users.adresse as adresse_user',

         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'
     )
         ->whereIn('procedure_exportations.id_poste_forestier',  $poste_array) 
         ->where('rejet_procedure_exportations.id_procedure_exportation',$id) 
         ->orderBy('rejet_procedure_exportations.created_at', 'DESC')
         ->get();
    }



  

    public function get_rejet_all_info_by_id_for_process($id,$process) {
         return DB::table('rejet_procedure_exportations')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'rejet_procedure_exportations.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
		 ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')

         ->select(
         'rejet_procedure_exportations.id','rejet_procedure_exportations.id_procedure_exportation',
         'rejet_procedure_exportations.id_statut_avant_rejet',
         'rejet_procedure_exportations.id_statut_apres_rejet',
         'rejet_procedure_exportations.id_agent_traitant',
         'rejet_procedure_exportations.raison_rejet',
         'rejet_procedure_exportations.date_rejet',
         'rejet_procedure_exportations.created_at',
         'rejet_procedure_exportations.updated_at',


         'procedure_exportations.numero',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
       

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'demande_annuelles.demande_pour_annee as annee_demande',

         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'statut_procedure_exportations.id as statut_procedure', 
         'statut_procedure_exportations.code as code_procedure', 
         'statut_procedure_exportations.libelle as libelle_statut', 

         'gl_pays.id as id_pays', 
         'gl_pays.titre as titre_pays', 

         'departements.id as id_departement_provenance', 
         'departements.nom as nom_departement_provenance', 

         'communes.id as id_communes_provenance', 
         'communes.nom as nom_communes_provenance', 

         'users.name as nom_user', 
         'users.firstname as prenom_user', 
         'users.email as email_user', 
         'users.telephone as telephone_user', 
         'users.adresse as adresse_user',

         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'
     )
          ->where('rejet_procedure_exportations.id',$id) 
          ->where('rejet_procedure_exportations.id_procedure_exportation',$process) 
           ->orderBy('procedure_exportations.created_at', 'DESC')
         ->get();
    }


     public function get_rejet_all_info_by_process($process) {
         return DB::table('rejet_procedure_exportations')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'rejet_procedure_exportations.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
       ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')

         ->select(
         'rejet_procedure_exportations.id','rejet_procedure_exportations.id_procedure_exportation',
         'rejet_procedure_exportations.id_statut_avant_rejet',
         'rejet_procedure_exportations.id_statut_apres_rejet',
         'rejet_procedure_exportations.id_agent_traitant',
         'rejet_procedure_exportations.raison_rejet',
         'rejet_procedure_exportations.date_rejet',
         'rejet_procedure_exportations.created_at',
         'rejet_procedure_exportations.updated_at',


         'procedure_exportations.numero',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
       

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'demande_annuelles.demande_pour_annee as annee_demande',

         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'statut_procedure_exportations.id as statut_procedure', 
         'statut_procedure_exportations.code as code_procedure', 
         'statut_procedure_exportations.libelle as libelle_statut', 

         'gl_pays.id as id_pays', 
         'gl_pays.titre as titre_pays', 

         'departements.id as id_departement_provenance', 
         'departements.nom as nom_departement_provenance', 

         'communes.id as id_communes_provenance', 
         'communes.nom as nom_communes_provenance', 

         'users.name as nom_user', 
         'users.firstname as prenom_user', 
         'users.email as email_user', 
         'users.telephone as telephone_user', 
         'users.adresse as adresse_user',

         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'
     )
          ->where('rejet_procedure_exportations.id_procedure_exportation',$process) 
           ->orderBy('procedure_exportations.created_at', 'DESC')
         ->get();
    }
}
