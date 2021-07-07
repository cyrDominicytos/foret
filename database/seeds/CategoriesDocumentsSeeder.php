<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CategorieDocument;

class CategoriesDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorie_documents')->delete();
        
        CategorieDocument::create(['id' => 1, 'designation' => 'Quittance de règlement']);
        CategorieDocument::create(['id' => 2, 'designation' => 'Document de référence']);
        CategorieDocument::create(['id' => 3, 'designation' => 'Constat Conformité']);
        CategorieDocument::create(['id' => 4, 'designation' => 'Laissez- passer']);
        CategorieDocument::create(['id' => 5, 'designation' => 'Contre Constat']);
        CategorieDocument::create(['id' => 6, 'designation' => 'Etat de Versement']);
        CategorieDocument::create(['id' => 7, 'designation' => 'Avis Technique']);
        CategorieDocument::create(['id' => 8, 'designation' => 'Avis Technique visé']);
        CategorieDocument::create(['id' => 9, 'designation' => 'Relevé de scanning']);
        CategorieDocument::create(['id' => 10, 'designation' => 'Carte Professionnelle']);
        CategorieDocument::create(['id' => 11, 'designation' => 'Permis de coupe']);
        CategorieDocument::create(['id' => 12, 'designation' => 'Carte d\'exportateur']);
        CategorieDocument::create(['id' => 13, 'designation' => 'BFU Brut']);
        CategorieDocument::create(['id' => 14, 'designation' => 'BFU Complet']);
        CategorieDocument::create(['id' => 15, 'designation' => 'BFU réglé']);
        CategorieDocument::create(['id' => 16, 'designation' => 'Fiche VGM']);
        CategorieDocument::create(['id' => 17, 'designation' => 'Demande Annuelle']);
        CategorieDocument::create(['id' => 18, 'designation' => 'Document de liquidation']);
        
    }
}
