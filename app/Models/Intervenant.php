<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intervenant extends AppModele
{
    //
     protected $fillable = ['titre'];
     
     /**
 * Get the user that owns the intervenant.
 */
public function user()
{
    return $this->belongsTo('App\Models\User', 'id_user');
}

/**
 * Get the poste that owns the intervenent.
 */
public function poste()
{
    return $this->belongsTo('App\Models\Poste', 'id_poste');
    
 } 

}
