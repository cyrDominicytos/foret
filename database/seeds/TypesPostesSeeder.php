<?php

use Illuminate\Database\Seeder;
use App\Models\TypesPostes;

class TypesPostesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types_postes')->delete();
        
        TypesPostes::create(['id' => 1, 'numero_type' => '100', 'titre' => 'Direction Générale des Eaux Forêts et Chasses', 'statut' => '1']);
        TypesPostes::create(['id' => 2, 'numero_type' => '101', 'titre' => 'Direction du Reboisement et de l\’Aménagement des Forêts', 'statut' => '1']);
        TypesPostes::create(['id' => 3, 'numero_type' => '102', 'titre' => 'Direction des Politiques, du Contrôle de l\’Exploitation Forestière et du Contentieux', 'statut' => '1']);
        TypesPostes::create(['id' => 4, 'numero_type' => '103', 'titre' => 'Inspection Forestière', 'statut' => '1']);
        TypesPostes::create(['id' => 5, 'numero_type' => '104', 'titre' => 'Cantonnement', 'statut' => '1']);
        TypesPostes::create(['id' => 6, 'numero_type' => '105', 'titre' => 'Section communale', 'statut' => '1']);
        TypesPostes::create(['id' => 7, 'numero_type' => '106', 'titre' => 'Poste Forestier', 'statut' => '1']);
        TypesPostes::create(['id' => 8, 'numero_type' => '107', 'titre' => 'Brigarde spéciale', 'statut' => '1']);
        
        
        TypesPostes::create(['id' => 9, 'numero_type' => '200', 'titre' => 'Douane Port', 'statut' => '1']);
        TypesPostes::create(['id' => 10, 'numero_type' => '300', 'titre' => 'Bénin Controle', 'statut' => '1']);
        TypesPostes::create(['id' => 11, 'numero_type' => '400', 'titre' => 'Conseil National des Chargeurs du Bénin', 'statut' => '1']);
    }
}
