<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcedureExportation extends Model
{
    protected $fillable = [ 'numero','id_demande_annuelle','id_usager','id_pays_destination','id_statut','reference_conteneur', 'reference_plomb','reference_transporteur','nom_conducteur','departement_empotage','commune_empotage','localite_empotage',
    'departement_provenance','commune_provenance','localite_provenance',

    'id_poste_forestier','reference_document_provenance','date_depart','volume_total','observation', 'updated_at', 'created_at'];
}
