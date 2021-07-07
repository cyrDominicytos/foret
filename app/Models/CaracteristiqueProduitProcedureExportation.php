<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CaracteristiqueProduitProcedureExportation extends AppModele
{
    protected $fillable = [ 'id_procedure_exportation','id_espece_produit','id_type_produit','epaisseur','largeur','longueur','volume', 'updated_at', 'created_at','type_exploitation','nature_recette'];


     public function get_caracteristique_procedure_exportation_by_id($id) {
         return DB::table('caracteristique_produit_procedure_exportations')
         ->join('espece_produits', 'espece_produits.id', '=', 'caracteristique_produit_procedure_exportations.id_espece_produit')
         ->join('type_produits', 'type_produits.id', '=', 'caracteristique_produit_procedure_exportations.id_type_produit')
         ->select(
         'caracteristique_produit_procedure_exportations.id','caracteristique_produit_procedure_exportations.id_procedure_exportation',
         'caracteristique_produit_procedure_exportations.id_espece_produit','caracteristique_produit_procedure_exportations.id_type_produit',
         'caracteristique_produit_procedure_exportations.epaisseur','caracteristique_produit_procedure_exportations.largeur',
         'caracteristique_produit_procedure_exportations.longueur','caracteristique_produit_procedure_exportations.volume','caracteristique_produit_procedure_exportations.created_at',
         'caracteristique_produit_procedure_exportations.updated_at',
         'caracteristique_produit_procedure_exportations.type_exploitation',
         'caracteristique_produit_procedure_exportations.nature_recette',

         'espece_produits.designation as espece_produits', 
         'espece_produits.prix_unitaire as prix_unitaire', 
         'type_produits.designation as type_produits', 
         'type_produits.categorie as categorie'
         
		 
     )
      ->where('caracteristique_produit_procedure_exportations.id_procedure_exportation',$id)
      ->orderBy('categorie')
      ->get();

    }


    public function get_caracteristique_procedure_exportation_by_id_and_categorie($id,$categorie) {
         return DB::table('caracteristique_produit_procedure_exportations')
         ->join('espece_produits', 'espece_produits.id', '=', 'caracteristique_produit_procedure_exportations.id_espece_produit')
         ->join('type_produits', 'type_produits.id', '=', 'caracteristique_produit_procedure_exportations.id_type_produit')

         

         ->select(
         'caracteristique_produit_procedure_exportations.id','caracteristique_produit_procedure_exportations.id_procedure_exportation',
         'caracteristique_produit_procedure_exportations.id_espece_produit','caracteristique_produit_procedure_exportations.id_type_produit',
         'caracteristique_produit_procedure_exportations.epaisseur','caracteristique_produit_procedure_exportations.largeur',
         'caracteristique_produit_procedure_exportations.longueur','caracteristique_produit_procedure_exportations.volume','caracteristique_produit_procedure_exportations.created_at',
         'caracteristique_produit_procedure_exportations.updated_at',
          'caracteristique_produit_procedure_exportations.type_exploitation',
         'caracteristique_produit_procedure_exportations.nature_recette',


         'espece_produits.designation as espece_produits', 
         'espece_produits.prix_unitaire as prix_unitaire', 
         'type_produits.designation as type_produits', 
         'type_produits.categorie as categorie'
         
         
     )
      ->where('caracteristique_produit_procedure_exportations.id_procedure_exportation',$id)
      ->where('type_produits.categorie',$categorie)
      ->orderBy('categorie')
      ->get();

    }


    public function get_caracteristique_procedure_exportation_by_id_group_by_espece($id) {
         return DB::table('caracteristique_produit_procedure_exportations')
         ->join('espece_produits', 'espece_produits.id', '=', 'caracteristique_produit_procedure_exportations.id_espece_produit')
         ->join('type_produits', 'type_produits.id', '=', 'caracteristique_produit_procedure_exportations.id_type_produit')

         

         ->select(
         'caracteristique_produit_procedure_exportations.id','caracteristique_produit_procedure_exportations.id_procedure_exportation',
         'caracteristique_produit_procedure_exportations.id_espece_produit','caracteristique_produit_procedure_exportations.id_type_produit',
         'caracteristique_produit_procedure_exportations.epaisseur','caracteristique_produit_procedure_exportations.largeur',
         'caracteristique_produit_procedure_exportations.longueur','
        sum(caracteristique_produit_procedure_exportations.volume) as volume','caracteristique_produit_procedure_exportations.created_at',
         'caracteristique_produit_procedure_exportations.updated_at',
         'caracteristique_produit_procedure_exportations.type_exploitation',
         'caracteristique_produit_procedure_exportations.nature_recette',

         'espece_produits.designation as espece_produits', 
         'espece_produits.prix_unitaire as prix_unitaire', 
         'type_produits.designation as type_produits', 
         'type_produits.categorie as categorie'
         
         
     )
      ->where('caracteristique_produit_procedure_exportations.id_procedure_exportation',$id)
      ->groupBy('caracteristique_produit_procedure_exportations.id_espece_produit')
      ->orderBy('categorie')
      ->get();

    }

  
}
