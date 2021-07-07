<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Grade extends AppModele
{
    use CrudTrait;
    use \Venturecraft\Revisionable\RevisionableTrait;
    
     protected $fillable = ['libelle'];

     
    

}
