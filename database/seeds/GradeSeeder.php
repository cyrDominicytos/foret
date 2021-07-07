<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Grade;
class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->delete();
        
        Grade::create(['id' => 1, 'libelle' => 'Général']);
        Grade::create(['id' => 2, 'libelle' => 'Colonel']);
        Grade::create(['id' => 3, 'libelle' => 'Lieutenant-colonel']);
        Grade::create(['id' => 4, 'libelle' => 'Commandant']);
        Grade::create(['id' => 5, 'libelle' => 'Capitaine']);
        Grade::create(['id' => 6, 'libelle' => 'Lieutenant']);
        Grade::create(['id' => 7, 'libelle' => 'Sous-lieutenant']);
        Grade::create(['id' => 8, 'libelle' => 'Major']);
        Grade::create(['id' => 9, 'libelle' => 'Adjudant-chef']);
        Grade::create(['id' => 10, 'libelle' => 'Adjudant']);
        Grade::create(['id' => 11, 'libelle' => 'Sergent-chef']);
        Grade::create(['id' => 12, 'libelle' => 'Sergent']);
        Grade::create(['id' => 13, 'libelle' => 'Caporal']);
              
    }
}
