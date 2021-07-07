<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\EspeceProduit;

class EspeceProduitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('espece_produits')->delete();
        
        EspeceProduit::create(['id' => 1, 'designation' => 'Teck', 'prix_unitaire' => '0', 'statut' => '1']);
        EspeceProduit::create(['id' => 2, 'designation' => 'Gmelina', 'prix_unitaire' => '0', 'statut' => '1']);
        EspeceProduit::create(['id' => 3, 'designation' => 'Acacia', 'prix_unitaire' => '0', 'statut' => '1']);
        EspeceProduit::create(['id' => 4, 'designation' => 'Autres espèces', 'prix_unitaire' => '0', 'statut' => '1']);
        EspeceProduit::create(['id' => 5, 'designation' => 'Autres produits forestiers', 'prix_unitaire' => '0', 'statut' => '1']);
        
    }
}
