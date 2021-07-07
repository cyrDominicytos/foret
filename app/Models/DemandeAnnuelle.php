<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeAnnuelle extends AppModele
{
    //
     protected $fillable = [ 'numero','id_usager','autre_information','demande_pour_annee', 'updated_at', 'created_at', 'date_creation'];


     public function get_all_demande_annuelle() {
         return DB::table('created_at')
      ->orderBy('categorie')
      ->get();
  }
}
