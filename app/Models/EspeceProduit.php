<?php

namespace App\Models;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

use Illuminate\Database\Eloquent\Model;

class EspeceProduit extends AppModele
{
    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait;
    
    //
    
     protected $fillable = [ 'designation','observation', 'prix_unitaire' , 'statut'];
}
