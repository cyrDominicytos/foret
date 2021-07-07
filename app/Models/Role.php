<?php

namespace App\Models;
use Backpack\CRUD\app\Models\Traits\CrudTrait;


class Role extends \Spatie\Permission\Models\Role
{
    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait; //L'utilisateur ne crée pas de rôles
    
    protected $fillable = ['name', 'display_name', 'guard_name', 'updated_at', 'created_at'];


    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */    
    
    
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */    
    

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */    
    /**
     * Scope a query to only select Super.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSuper($query) {
        return $query->where('name', 'SuperAdmin')
                ->where('guard_name', guard_admin())
                ->firstOrFail();
    }

    /**
     * Scope a query to only select Admin.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdmin($query) {
        return $query->where('name', 'Admin')
                ->where('guard_name', guard_admin())
                ->firstOrFail();
    }

    /**
     * Scope a query to only select Intervenant.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUsager($query) {
        return $query->where('name', 'Usager')
                ->where('guard_name', guard_web())
                ->firstOrFail();
    }
    
    /**
     * Scope a query to only select Intervenant.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAgentForestier($query) {
        return $query->where('name', 'Agent_Forestier')
                ->where('guard_name', guard_web())
                ->firstOrFail();
    }
    
    
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    
}
