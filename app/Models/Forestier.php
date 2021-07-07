<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forestier extends AppModele
{
    //
    protected $fillable = ['titre','grade','id_poste'];
    
    /*
      |--------------------------------------------------------------------------
      | Relations
      |--------------------------------------------------------------------------
     */
    /**
 * Get the user that owns the forestier.
 */
public function user()
{
    return $this->belongsTo('App\Models\User', 'id_user');
}

/**
 * Get the poste that owns the forestier.
 */
public function poste()
{
    return $this->belongsTo('App\Models\Poste', 'id_poste');
    
 } 
 
 
 
 /*
      |--------------------------------------------------------------------------
      | Accessors
      |--------------------------------------------------------------------------
     */
    
     /**
     * Get the titre of forestier.
     *
     * @param  string  $value
     * @return string
     */
    public function getCommuneAttribute()
    {
    return $this->poste->commune ;

    }
     
    public function getPrenomNomAttribute()
    {
    return $this->user->firstname.' '.$this->user->name ;

    }
    
    public function getEmailAttribute()
    {
    return $this->user->email ;

    }

}
