<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Parametre;

class ParametresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parametres')->delete();
        
        Parametre::create(['id' => 1, 'code' => 'intitule_compte', 'designation' => 'Intitulé du compte de versement', 'double_value' => NULL, 'int_value' => NULL, 'string_value' => '46618', 'modification_faite_par' => '2']);
        Parametre::create(['id' => 2, 'code' => 'délai_laissez_passer', 'designation' => 'Délai de validité du laissez passer', 'double_value' => NULL, 'int_value' => 14, 'string_value' => NULL, 'modification_faite_par' => '2']);
        Parametre::create(['id' => 3, 'code' => 'délai_avis_technique', 'designation' => 'Délai de validité de l\'avis technique', 'double_value' => NULL, 'int_value' => 14, 'string_value' => NULL, 'modification_faite_par' => '2']);
        
    }
}
