<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Pay extends AppModele {

    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait;

    /*
      |--------------------------------------------------------------------------
      | GLOBAL VARIABLES
      |--------------------------------------------------------------------------
     */

    protected $table = 'gl_pays';    

    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'uuid',
        'titre',
        'code',
        'indicatif',
    ];

    // protected $hidden = [];
    // protected $dates = [];

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

    /**
     * Etat
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function etats() {
        return $this->hasMany('App\Models\Etat');
    }
    
    /**
     * Etat
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function departements() {
        return $this->hasMany('App\Models\Departement','id_pays');
    }

    /*
      |--------------------------------------------------------------------------
      | SCOPES
      |--------------------------------------------------------------------------
     */


    /*
      |--------------------------------------------------------------------------
      | ACCESORS
      |--------------------------------------------------------------------------
     */

    /*
      |--------------------------------------------------------------------------
      | MUTATORS
      |--------------------------------------------------------------------------
     */
}
