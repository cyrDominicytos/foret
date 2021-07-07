<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Parametre extends AppModele
{
    
    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait;
    
    //
    protected $fillable = ['code','designation','double_value','int_value','string_value','modification_faite_par'];
    
    
  
    /**
 * Get the lats user that modify the parameter.
 */
public function user()
{
    return $this->belongsTo('App\Models\User', 'modification_faite_par');
}


/**
     * Get nom et prénom du dernier utilisateur ayant modifié le paramètre.
     *
     * @param  string  $value
     * @return string
     */
    public function getNomUserAttribute()
    {
        return $this->user->firstname.' '.$this->user->name;       
    }
    
}
