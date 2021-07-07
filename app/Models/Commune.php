<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Commune extends AppModele
{
    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait;
    
    protected $fillable = [
        
        'nom',
        'id_departement',
        'status',
    ];
    
    
    /*
      |--------------------------------------------------------------------------
      | Relations
      |--------------------------------------------------------------------------
     */
    /**
    /**
     * Get the commune record associated with the forestier.
     */
    public function postes()
    {
        return $this->hasMany('App\Models\Poste', 'id_commune');
    }
    
    /**
     * Ville
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departement() {
        return $this->belongsTo('App\Models\Departement', 'id_departement');
    }

}
