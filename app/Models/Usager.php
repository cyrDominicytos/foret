<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usager extends AppModele
{
     protected $fillable = [ 'reference_carte_professionnelle','reference_permis_coupe'];

     
     /*
      |--------------------------------------------------------------------------
      | Relations
      |--------------------------------------------------------------------------
     */
    /**
 * Get the user that owns the usager.
 */
public function user()
{
    return $this->belongsTo('App\Models\User', 'id_user');
}


}
