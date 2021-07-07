<?php

namespace App\Models;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

use Illuminate\Database\Eloquent\Model;

class Departement extends AppModele
{
    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait;
    
    protected $fillable = [
        
        'nom',
        'id_pays',
    ];

    
   /**
     * Pay
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pay() {
        return $this->belongsTo('App\Models\Pay', 'id_pays');
    }
    
    /**
     * Etat
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communes() {
        return $this->hasMany('App\Models\Commune', 'id_departement');
    }
}
