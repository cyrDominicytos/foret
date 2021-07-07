<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EtatVersement extends AppModele
{
   
    protected $fillable = ['numero','id_procedure_exportation','id_agent_traitant','observation','date_versement', 'updated_at', 'created_at', 'montant_total', 'date_reglement', 'date_quittance', 'numero_quittance', 'quittance_delivre_a', 'nom_commissaire_agree', 'contact_commissaire_agree' ];

    public function get_etat_versement_all_info_by_id($id) {
         return DB::table('etat_versements')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'etat_versements.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
		 ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'etat_versements.id_agent_traitant')

         ->select(
         'etat_versements.id',
         'etat_versements.numero',
         'etat_versements.id_procedure_exportation',
         'etat_versements.id_agent_traitant',
         'etat_versements.date_versement',
         'etat_versements.date_reglement',
         'etat_versements.observation',
         'etat_versements.montant_total',
         'etat_versements.created_at',
         'etat_versements.updated_at',

         'etat_versements.date_quittance',
         'etat_versements.numero_quittance',
         'etat_versements.quittance_delivre_a',
         'etat_versements.nom_commissaire_agree',
         'etat_versements.contact_commissaire_agree',

         'forestiers.id_user as id_user_forestiers',
         'forestiers.id_poste as id_poste_forestiers',
         'forestiers.titre as titre_forestiers',
         'forestiers.grade as grade_forestiers',

         'procedure_exportations.numero as numero_procedure',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
         'procedure_exportations.updated_at', 'procedure_exportations.created_at',

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',
         'postes.adresse as poste_adresse',

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

         'usagers.id_user as id_user_usagers',
         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'

     )->where('etat_versements.id',$id) ->get();
    }
	
	public function get_etat_versement_all_info_by_id_for_user($id, $user) {
         return DB::table('etat_versements')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'etat_versements.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
		 ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'etat_versements.id_agent_traitant')

         ->select(
         'etat_versements.id',
         'etat_versements.numero',
         'etat_versements.id_procedure_exportation',
         'etat_versements.id_agent_traitant',
         'etat_versements.date_versement',
         'etat_versements.date_reglement',
         'etat_versements.observation',
         'etat_versements.montant_total',
         'etat_versements.created_at',
         'etat_versements.updated_at',

         'etat_versements.date_quittance',
         'etat_versements.numero_quittance',
         'etat_versements.quittance_delivre_a',
         'etat_versements.nom_commissaire_agree',
         'etat_versements.contact_commissaire_agree',

         'forestiers.id_user as id_user_forestiers',
         'forestiers.id_poste as id_poste_forestiers2',
         'forestiers.titre as titre_forestiers',
         'forestiers.grade as grade_forestiers',

         'procedure_exportations.numero as numero_procedure',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
         'procedure_exportations.updated_at', 'procedure_exportations.created_at',

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',
         'postes.adresse as poste_adresse',

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

         'usagers.id_user as id_user_usagers',
         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'

     )->where('procedure_exportations.id_usager',$user)->where('etat_versements.id',$id) ->get();
    }

public function get_etat_versement_all_info_by_user($user) {
         return DB::table('etat_versements')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'etat_versements.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
		 ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'etat_versements.id_agent_traitant')

         ->select(
         'etat_versements.id',
         'etat_versements.numero',
         'etat_versements.id_procedure_exportation',
         'etat_versements.id_agent_traitant',
         'etat_versements.date_versement',
         'etat_versements.date_reglement',
         'etat_versements.observation',
         'etat_versements.montant_total',
         'etat_versements.created_at',
         'etat_versements.updated_at',

         'forestiers.id_user as id_user_forestiers',
         'forestiers.id_poste as id_poste_forestiers',
         'forestiers.titre as titre_forestiers',
         'forestiers.grade as grade_forestiers',

         'procedure_exportations.numero as numero_procedure',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
         'procedure_exportations.updated_at', 'procedure_exportations.created_at',

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',
         'postes.adresse as poste_adresse',

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

         'usagers.id_user as id_user_usagers',
         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'

     )->where('procedure_exportations.id_usager',$user)->get();
    }

public function get_etat_versements_all_info_by_id_for_poste($id, $poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;

         return DB::table('etat_versements')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'etat_versements.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
       ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'etat_versements.id_agent_traitant')

         ->select(
         'etat_versements.id',
         'etat_versements.numero',
         'etat_versements.id_procedure_exportation',
         'etat_versements.id_agent_traitant',
         'etat_versements.date_versement',
         'etat_versements.date_reglement',
         'etat_versements.observation',
         'etat_versements.montant_total',
         'etat_versements.created_at',
         'etat_versements.updated_at',

         'forestiers.id_user as id_user_forestiers',
         'forestiers.id_poste as id_poste_forestiers',
         'forestiers.titre as titre_forestiers',
         'forestiers.grade as grade_forestiers',

         'procedure_exportations.numero as numero_procedure',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
         'procedure_exportations.updated_at', 'procedure_exportations.created_at',

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',
         'postes.adresse as poste_adresse',

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

         'usagers.id_user as id_user_usagers',
         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'

     )
      ->whereIn('procedure_exportations.id_poste_forestier',  $poste_array) 
      ->where('etat_versements.id',$id) ->get();
    }


    public function get_etat_versements_all_info($poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;


         return DB::table('etat_versements')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'etat_versements.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
         ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'etat_versements.id_agent_traitant')

         ->select(
        'etat_versements.id',
         'etat_versements.numero',
         'etat_versements.id_procedure_exportation',
         'etat_versements.id_agent_traitant',
         'etat_versements.date_versement',
         'etat_versements.date_reglement',
         'etat_versements.observation',
         'etat_versements.montant_total',
         'etat_versements.created_at',
         'etat_versements.updated_at',

         'forestiers.id_user as id_user_forestiers',
         'forestiers.id_poste as id_poste_forestiers',
         'forestiers.titre as titre_forestiers',
         'forestiers.grade as grade_forestiers',

         'procedure_exportations.numero as numero_procedure',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
         'procedure_exportations.updated_at', 'procedure_exportations.created_at',

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
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

         'usagers.id_user as id_user_usagers',
         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 

         'usagers.reference_permis_coupe as reference_permis_coupe_usagers' 
     )
 	       ->whereIn('procedure_exportations.id_poste_forestier',  $poste_array) 
         ->orderBy('etat_versements.created_at','DESC')
         ->get();
    }


public function get_etat_versement_regle_all_info_by_user($user) {
         return DB::table('etat_versements')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'etat_versements.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
		 ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'etat_versements.id_agent_traitant')

         ->select(
         'etat_versements.id',
         'etat_versements.numero',
         'etat_versements.id_procedure_exportation',
         'etat_versements.id_agent_traitant',
         'etat_versements.date_versement',
         'etat_versements.date_reglement',
         'etat_versements.observation',
         'etat_versements.montant_total',
         'etat_versements.created_at',
         'etat_versements.updated_at',

         'forestiers.id_user as id_user_forestiers',
         'forestiers.id_poste as id_poste_forestiers',
         'forestiers.titre as titre_forestiers',
         'forestiers.grade as grade_forestiers',

         'procedure_exportations.numero as numero_procedure',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
         'procedure_exportations.updated_at', 'procedure_exportations.created_at',

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',
         'postes.adresse as poste_adresse',

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

         'usagers.id_user as id_user_usagers',
         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'

     )
      ->where('procedure_exportations.id_usager',$user)
      ->where('procedure_exportations.id_statut',  6)
     ->get();
    }


    public function get_etat_versement_non_regle_all_info_by_user($user) {
         return DB::table('etat_versements')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'etat_versements.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
		 ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'etat_versements.id_agent_traitant')

         ->select(
         'etat_versements.id',
         'etat_versements.numero',
         'etat_versements.id_procedure_exportation',
         'etat_versements.id_agent_traitant',
         'etat_versements.date_versement',
         'etat_versements.date_reglement',
         'etat_versements.observation',
         'etat_versements.montant_total',
         'etat_versements.created_at',
         'etat_versements.updated_at',

         'forestiers.id_user as id_user_forestiers',
         'forestiers.id_poste as id_poste_forestiers',
         'forestiers.titre as titre_forestiers',
         'forestiers.grade as grade_forestiers',

         'procedure_exportations.numero as numero_procedure',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation', 'procedure_exportations.telephone_conducteur', 
         'procedure_exportations.updated_at', 'procedure_exportations.created_at',

         'demande_annuelles.numero as numero_demande', 'demande_annuelles.id as id_demande',
         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',
         'postes.adresse as poste_adresse',

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

         'usagers.id_user as id_user_usagers',
         'usagers.reference_carte_professionnelle as reference_carte_professionnelle_usagers', 
         'usagers.reference_permis_coupe as reference_permis_coupe_usagers'

     )
      ->where('procedure_exportations.id_usager',$user)
     ->where('procedure_exportations.id_statut',  5)
      ->get();
    }


}
