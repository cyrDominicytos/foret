<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Departement;

class DepartementsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('departements')->delete();
        
        Departement::create(['id' => 1, 'nom' => 'Littoral', 'id_pays' => '23']);
        Departement::create(['id' => 2, 'nom' => 'Atlantique', 'id_pays' => '23']);
        Departement::create(['id' => 3, 'nom' => 'Ouémé', 'id_pays' => '23']);
        Departement::create(['id' => 4, 'nom' => 'Plateau', 'id_pays' => '23']);
        Departement::create(['id' => 5, 'nom' => 'Zou', 'id_pays' => '23']);
        Departement::create(['id' => 6, 'nom' => 'Collines', 'id_pays' => '23']);
        Departement::create(['id' => 7, 'nom' => 'Mono', 'id_pays' => '23']);
        Departement::create(['id' => 8, 'nom' => 'Couffo', 'id_pays' => '23']);
        Departement::create(['id' => 9, 'nom' => 'Borgou', 'id_pays' => '23']);
        Departement::create(['id' => 10, 'nom' => 'Alibori', 'id_pays' => '23']);
        Departement::create(['id' => 11, 'nom' => 'Atacora', 'id_pays' => '23']);
        Departement::create(['id' => 12, 'nom' => 'Donga', 'id_pays' => '23']);
       
        

        
        
    }
}