<?php

namespace App\Models;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vgm extends AppModele
{
    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait;
    
    //
    
     protected $fillable = [ 'autorite','observation', 'date_vgm','id_procedure_exportation'];



     public function get_vgm_all_info_by_id($id) {
         return DB::table('vgms')
         ->join('procedure_exportations', 'vgms.id_procedure_exportation', '=', 'procedure_exportations.id')
         ->join('demande_annuelles', 'demande_annuelles.id', '=', 'procedure_exportations.id_demande_annuelle') 
         ->join('usagers', 'procedure_exportations.id_usager', '=', 'usagers.id')
         ->join('intervenants', 'intervenants.id', '=', 'vgms.autorite')
         ->join('postes', 'procedure_exportations.id_poste_forestier', '=', 'postes.id')
         ->join('gl_pays', 'procedure_exportations.id_pays_destination', '=', 'gl_pays.id')
         ->join('statut_procedure_exportations', 'procedure_exportations.id_statut', '=', 'statut_procedure_exportations.id')
         ->join('communes', 'communes.id', '=', 'procedure_exportations.commune_provenance')
         ->join('departements', 'procedure_exportations.departement_provenance', '=', 'departements.id') 
         ->join('users', 'usagers.id_user', '=', 'users.id')

         ->select(
         'vgms.id',
         'vgms.autorite',
         'vgms.id_procedure_exportation',
         'vgms.observation',
         'vgms.date_vgm',
         

         'procedure_exportations.numero',
         'procedure_exportations.id_demande_annuelle','procedure_exportations.id_usager',
         'procedure_exportations.id_pays_destination','procedure_exportations.id_statut',
         'procedure_exportations.reference_conteneur','procedure_exportations.reference_plomb','procedure_exportations.reference_transporteur',
         'procedure_exportations.nom_conducteur','procedure_exportations.departement_empotage','procedure_exportations.commune_empotage','procedure_exportations.localite_empotage',
         'procedure_exportations.departement_provenance','procedure_exportations.commune_provenance','procedure_exportations.id_poste_forestier',
         'procedure_exportations.reference_document_provenance','procedure_exportations.date_depart','procedure_exportations.volume_total', 'procedure_exportations.observation as pro_observation', 'procedure_exportations.telephone_conducteur', 
         'procedure_exportations.updated_at', 'procedure_exportations.created_at',

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


     )    ->where('vgms.id', $id)
          ->orderBy('procedure_exportations.created_at', 'DESC')
          ->get();
    }
}
