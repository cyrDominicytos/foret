<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProduitsExportesParAnnee extends AppModele
{
    protected $fillable = ['id_usager', 'id_espece_produit','id_type_produit','volume', 'id_commune_provenance','id_commune_empotage', 'annee'];



    public function get_produit_exportes_par_annee($usager, $annee) {
         return DB::table('produits_exportes_par_annees')
         ->join('espece_produits', 'espece_produits.id', '=', 'produits_exportes_par_annees.id_espece_produit')
         ->join('type_produits', 'type_produits.id', '=', 'produits_exportes_par_annees.id_type_produit')
         ->join('communes', 'communes.id', '=', 'produits_exportes_par_annees.id_commune_provenance')

         

         ->select(
        'produits_exportes_par_annees.id_usager',
         'produits_exportes_par_annees.id_espece_produit','produits_exportes_par_annees.id_type_produit',
            'produits_exportes_par_annees.volume',
            'produits_exportes_par_annees.id_commune_provenance',
         'produits_exportes_par_annees.id_commune_empotage',
         'produits_exportes_par_annees.annee',

         'espece_produits.designation as espece_produits', 
         'type_produits.designation as type_produits', 
         'type_produits.categorie as categorie', 

         'communes.nom as commune_provenance' 
         
		 
     )
      ->where('produits_exportes_par_annees.id_usager',$usager)
      ->where('produits_exportes_par_annees.annee',$annee)
      ->get();

    }
}
