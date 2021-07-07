<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AvisTechnique extends AppModele
{

    protected $fillable = ['numero','id_procedure_exportation','id_agent_emission','id_agent_extension','debut_validite','fin_validite','fin_validite_etendue','observation','date_avis_technique'];






     public function get_avis_techniques_all_info_by_id($id) {
         return DB::table('avis_techniques')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'avis_techniques.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
		 ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'avis_techniques.id_agent_emission')

         ->select(
         'avis_techniques.id',
         'avis_techniques.numero',
         'avis_techniques.id_procedure_exportation',
         'avis_techniques.debut_validite',
         'avis_techniques.fin_validite',
         'avis_techniques.fin_validite_etendue',
         'avis_techniques.id_agent_emission',
         'avis_techniques.id_agent_extension',
         'avis_techniques.observation',
         'avis_techniques.date_avis_technique',
         'avis_techniques.created_at',
         'avis_techniques.updated_at',

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
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total','procedure_exportations.observation', 
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

     )->where('avis_techniques.id',$id) ->get();
    }

public function get_avis_techniques_all_info_by_id_for_poste($id,$poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;

         return DB::table('avis_techniques')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'avis_techniques.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
       ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'avis_techniques.id_agent_emission')

         ->select(
         'avis_techniques.id',
         'avis_techniques.numero',
         'avis_techniques.id_procedure_exportation',
         'avis_techniques.debut_validite',
         'avis_techniques.fin_validite',
         'avis_techniques.fin_validite_etendue',
         'avis_techniques.id_agent_emission',
         'avis_techniques.id_agent_extension',
         'avis_techniques.observation',
         'avis_techniques.date_avis_technique',
         'avis_techniques.created_at',
         'avis_techniques.updated_at',

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
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total','procedure_exportations.observation', 
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
         ->where('avis_techniques.id',$id) ->get();
    }

public function get_avis_techniques_to_extend_by_id_for_poste($poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;

         return DB::table('avis_techniques')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'avis_techniques.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
       ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'avis_techniques.id_agent_emission')

         ->select(
         'avis_techniques.id',
         'avis_techniques.numero',
         'avis_techniques.id_procedure_exportation',
         'avis_techniques.debut_validite',
         'avis_techniques.fin_validite',
         'avis_techniques.fin_validite_etendue',
         'avis_techniques.id_agent_emission',
         'avis_techniques.id_agent_extension',
         'avis_techniques.observation',
         'avis_techniques.date_avis_technique',
         'avis_techniques.created_at',
         'avis_techniques.updated_at',

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
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total','procedure_exportations.observation', 
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
         ->where('avis_techniques.fin_validite','<',date('Y-m-d'))
         ->whereIn('procedure_exportations.id_poste_forestier',  $poste_array) 

         ->get();
    }


    public function get_avis_techniques_all_info($poste_id) {
          $poste = Poste::find($poste_id); 
          $poste_array = $poste->postesFils->pluck('id')->toArray(); 
          $poste_array[count($poste_array)] = $poste_id;

         return DB::table('avis_techniques')
         ->join('procedure_exportations', 'procedure_exportations.id', '=', 'avis_techniques.id_procedure_exportation')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle')
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
         ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')
         ->join('forestiers', 'forestiers.id', '=', 'avis_techniques.id_agent_emission')

         ->select(
         'avis_techniques.id',
         'avis_techniques.numero',
         'avis_techniques.id_procedure_exportation',
         'avis_techniques.debut_validite',
         'avis_techniques.fin_validite',
         'avis_techniques.fin_validite_etendue',
         'avis_techniques.id_agent_emission',
         'avis_techniques.id_agent_extension',
         'avis_techniques.observation',
         'avis_techniques.date_avis_technique',
         'avis_techniques.created_at',
         'avis_techniques.updated_at',

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
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total','procedure_exportations.observation', 
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
         ->orderBy('avis_techniques.created_at','DESC')

         ->get();
    }




    

}
