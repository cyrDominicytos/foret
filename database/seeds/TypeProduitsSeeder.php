<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TypeProduit;

class TypeProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_produits')->delete();
        
        TypeProduit::create(['id' => 1, 'designation' => 'Billes', 'categorie' => '1', 'statut' => '1']);
        TypeProduit::create(['id' => 2, 'designation' => 'Grumes', 'categorie' => '1', 'statut' => '1']);
        TypeProduit::create(['id' => 3, 'designation' => 'Madriers', 'categorie' => '2', 'statut' => '1']);
        TypeProduit::create(['id' => 4, 'designation' => 'Equarris', 'categorie' => '2', 'statut' => '1']);
        TypeProduit::create(['id' => 5, 'designation' => 'Plots', 'categorie' => '2', 'statut' => '1']);
        TypeProduit::create(['id' => 6, 'designation' => 'Poteaux', 'categorie' => '2', 'statut' => '1']);
        TypeProduit::create(['id' => 7, 'designation' => 'Bastaing', 'categorie' => '3', 'statut' => '1']);
        TypeProduit::create(['id' => 8, 'designation' => 'Planches', 'categorie' => '3', 'statut' => '1']);
        TypeProduit::create(['id' => 9, 'designation' => 'Chevrons', 'categorie' => '3', 'statut' => '1']);
        TypeProduit::create(['id' => 10, 'designation' => 'Parquets', 'categorie' => '3', 'statut' => '1']);
        TypeProduit::create(['id' => 11, 'designation' => 'Frises', 'categorie' => '3', 'statut' => '1']);
        TypeProduit::create(['id' => 12, 'designation' => 'Produits finis élaborés', 'categorie' => '4', 'statut' => '1']);
    }
}
