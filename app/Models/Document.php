<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends AppModele
{
    //
    protected $fillable = [ 'nom_fichier','nom_entite','chemin','date_creation','updated_at','created_at'];
}
