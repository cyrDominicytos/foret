<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\StatutProcedureExportation;

class StatutProcedureExportationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statut_procedure_exportations')->delete();
        
        StatutProcedureExportation::create(['id' => 1, 'code' => '1', 'libelle' => 'En attente de constat de conformité']);
        StatutProcedureExportation::create(['id' => 2, 'code' => '2', 'libelle' => 'Constat de  conformité obtenu']);
        StatutProcedureExportation::create(['id' => 3, 'code' => '3', 'libelle' => 'Laissez-passer obtenu']);
        StatutProcedureExportation::create(['id' => 4, 'code' => '4', 'libelle' => 'Contre constat obtenu']);
        StatutProcedureExportation::create(['id' => 5, 'code' => '5', 'libelle' => 'Etat de versement délivré']);
        StatutProcedureExportation::create(['id' => 6, 'code' => '6', 'libelle' => 'Etat de versement réglé']);
        StatutProcedureExportation::create(['id' => 7, 'code' => '7', 'libelle' => 'Avis Technique obtenu']);
        StatutProcedureExportation::create(['id' => 8, 'code' => '8', 'libelle' => 'BFU brut obtenu']);
        StatutProcedureExportation::create(['id' => 9, 'code' => '9', 'libelle' => 'Visa obtenu sur l\'AT']);
        StatutProcedureExportation::create(['id' => 10, 'code' => '10', 'libelle' => 'Scanning Validé']);
        StatutProcedureExportation::create(['id' => 11, 'code' => '11', 'libelle' => 'BFU Complet obtenu']);
        StatutProcedureExportation::create(['id' => 12, 'code' => '12', 'libelle' => 'BFU Complet réglé']);
        StatutProcedureExportation::create(['id' => 13, 'code' => '13', 'libelle' => 'Produit embarqué et exporté']);
        StatutProcedureExportation::create(['id' => 1002, 'code' => '1002', 'libelle' => 'Constat de  conformité rejeté']);
        StatutProcedureExportation::create(['id' => 1003, 'code' => '1003', 'libelle' => 'Laissez-passer rejeté']);
        StatutProcedureExportation::create(['id' => 1004, 'code' => '1004', 'libelle' => 'Contre constat rejeté']);
        StatutProcedureExportation::create(['id' => 1007, 'code' => '1007', 'libelle' => 'Avis Technique rejeté']);
        StatutProcedureExportation::create(['id' => 1009, 'code' => '1009', 'libelle' => 'Visa non apposé sur l\'AT']);
        StatutProcedureExportation::create(['id' => 10010, 'code' => '10010', 'libelle' =>'Scanning non conforme']);
        StatutProcedureExportation::create(['id' => 10013, 'code' => '10013', 'libelle' =>'Embarquement rejeté']);
        
    }
}
