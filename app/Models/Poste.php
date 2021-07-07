<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Support\Facades\DB;

class Poste extends AppModele
{
    
    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait;
    
    protected $fillable = [
        
        'nom',
        'telephone',
        'adresse',
        'type',
        'id_commune',
        'observation',
        'status',
    ];
    
    
    /*
      |--------------------------------------------------------------------------
      | Relations
      |--------------------------------------------------------------------------
     */
    /**
    /**
     * Get the poste record associated with the procedure.
     */
    public function procedureExportations()
    {
        return $this->hasMany('App\Models\ProcedureExportation', 'id_poste_forestier');
    }
    /**
    /**
     * Get the poste record associated with the forestier.
     */
    public function forestiers()
    {
        return $this->hasMany('App\Models\Forestier', 'id_poste');
    }
    /**
    /**
     * Get the poste record associated with the forestier.
     */
    public function intervenants()
    {
        return $this->hasMany('App\Models\Intervenant', 'id_poste');
    }
    
    /**
 * Get the commune that owns the poste.
 */
public function commune()
{
    return $this->belongsTo('App\Models\Commune', 'id_commune');
    
 }
 
 /**
     * Détermine les poste fils à partir du poste parent.
     */
    public function postesFils()
    {
        return $this->belongsToMany('App\Models\Poste', 'postes_pivot', 'id_poste_parent', 'id_poste_fils');
    }
    
     /**
     * Détermine les postes parent à partir du poste fils.
     */
    public function postesParents()
    {
        return $this->belongsToMany('App\Models\Poste', 'postes_pivot', 'id_poste_fils', 'id_poste_parent');
    }


    public function getPosteDgefcUsers($type)
    {
         return DB::table('postes')
         ->join('forestiers', 'forestiers.id_poste', '=', 'postes.id')
         ->join('users', 'users.id', '=', 'forestiers.id_user')
          
         ->select(
         'forestiers.id',
         'forestiers.id_poste as poste_forestier',
         'forestiers.titre',
         'forestiers.id_user',
        
         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'users.name as name', 
         'users.firstname as firstname', 
         'users.email as email', 
         'users.telephone as telephone', 
         'users.adresse as adresse'

     )   ->where('type', $type)
         ->get();
    
    }


    public function getPosteStaticAuth($type)
    {
         return DB::table('postes')
         ->join('forestiers', 'forestiers.id_poste', '=', 'postes.id')
         ->join('users', 'users.id', '=', 'forestiers.id_user')
          
         ->select(
         'forestiers.id',
         'forestiers.id_poste as poste_forestier',
         'forestiers.titre',
         'forestiers.id_user',
        
         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'users.name as name', 
         'users.firstname as firstname', 
         'users.email as email', 
         'users.telephone as telephone', 
         'users.adresse as adresse'

     )   ->where('type', $type)
         ->get();
    
    }
    
    public function getPosteIntervenant($type)
    {
         return DB::table('postes')
         ->join('intervenants', 'intervenants.id_poste', '=', 'postes.id')
         ->join('users', 'users.id', '=', 'intervenants.id_user')
          
         ->select(
         'intervenants.id',
         'intervenants.id_poste as poste_forestier',
         'intervenants.titre',
         'intervenants.id_user',
        
         'postes.id as id_poste', 'postes.nom as nom_poste','postes.id_commune as commune_poste',

         'users.name as name', 
         'users.firstname as firstname', 
         'users.email as email', 
         'users.telephone as telephone', 
         'users.adresse as adresse'

     )   ->where('type', $type)
         ->get();
    
    }

 
}
