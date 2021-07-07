<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ContreConstat extends AppModele
{
    //
    protected $fillable = ['numero', 'id_procedure_exportation','conformite_au_constat_conformite', 'id_agent_traitant','observation','date_contre_constat', 'updated_at', 'created_at'];



     public function get_Contre_constat_all_info_by_id($id) {
         return DB::table('contre_constats')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'contre_constats.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
		 ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'contre_constats.id_agent_traitant')

         ->select(
         'contre_constats.id',
         'contre_constats.numero',
         'contre_constats.id_procedure_exportation',
         'contre_constats.conformite_au_constat_conformite',
         'contre_constats.id_agent_traitant',
         'contre_constats.observation',
         'contre_constats.date_contre_constat',
         'contre_constats.created_at',
         'contre_constats.updated_at',

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
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total','procedure_exportations.observation as observation_procedure', 
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

     )->where('contre_constats.id',$id) ->get();
    }

   public function get_contre_constats_all_info_by_id_for_poste($id, $poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;

         return DB::table('contre_constats')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'contre_constats.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
       ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'contre_constats.id_agent_traitant')

         ->select(
          'contre_constats.id',
         'contre_constats.numero',
         'contre_constats.id_procedure_exportation',
         'contre_constats.conformite_au_constat_conformite',
         'contre_constats.id_agent_traitant',
         'contre_constats.observation',
         'contre_constats.date_contre_constat',
         'contre_constats.created_at',
         'contre_constats.updated_at',

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
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total','procedure_exportations.observation as observation_procedure', 
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

         ->where('contre_constats.id',$id) ->get();
    }


    public function get_contre_constats_all_info($poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;

         return DB::table('contre_constats')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'contre_constats.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
         ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'contre_constats.id_agent_traitant')

         ->select(
         'contre_constats.id',
         'contre_constats.numero',
         'contre_constats.id_procedure_exportation',
         'contre_constats.conformite_au_constat_conformite',
         'contre_constats.id_agent_traitant',
         'contre_constats.observation',
         'contre_constats.date_contre_constat',
         'contre_constats.created_at',
         'contre_constats.updated_at',

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
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total','procedure_exportations.observation as observation_procedure', 
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
         ->orderBy('contre_constats.created_at','DESC')
         ->get();
    }
}
