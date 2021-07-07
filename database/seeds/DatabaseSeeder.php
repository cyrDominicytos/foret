<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         
        /*
        |--------------------------------------------------------------------------
        | Gestion
        |--------------------------------------------------------------------------
        */
         $this->call(RolesAndPermissionsSeeder::class);
         $this->command->info('Role table seeded !');

         $this->call(UsersTableSeeder::class);
         $this->command->info('User table seeded !');
         
        /*
        |--------------------------------------------------------------------------
        | Configuration
        |--------------------------------------------------------------------------
        */
         $this->call(SettingsTableSeeder::class);
         $this->command->info('Setting table seeded !');
         
         $this->call(PaysTableSeeder::class);
         $this->command->info('Pays table seeded !');
         
         $this->call(DepartementsTableSeeder::class);
         $this->command->info('Departements table seeded !');
         
         $this->call(CommunesTableSeeder::class);
         $this->command->info('Communes table seeded !');
         
         $this->call(TypesPostesSeeder::class);
         $this->command->info('Types Postes table seeded !');
         
         $this->call(CategoriesDocumentsSeeder::class);
         $this->command->info('Categories documents table seeded !');
         
         $this->call(PostesTableSeeder::class);
         $this->command->info('Poste table seeded !');
         
         
         $this->call(EtatsTableSeeder::class);
         $this->command->info('Etats table seeded !');
         
         $this->call(VillesTableSeeder::class);
         $this->command->info('Villes table seeded !');
         
         $this->call(TypeProduitsSeeder::class);
         $this->command->info('TypeProduits table seeded !');
         
         $this->call(EspeceProduitsSeeder::class);
         $this->command->info('EspeceProduits table seeded !');
         
         $this->call(StatutProcedureExportationsSeeder::class);
         $this->command->info('statut_procedure_exportations table seeded !');
         

         $this->call(produits_exportes_par_annee_view::class);
         $this->command->info('Vue produits_exportes_par_annee bien céée !');
         
         $this->call(ParametresTableSeeder::class);
         $this->command->info('Paramètres table seeded !');

         $this->call(GradeSeeder::class);
         $this->command->info('Grades table seeded !');
         
    }
}
