<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Commune;

class CommunesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('communes')->delete();
        
        //1 Littoral
        Commune::create(['id' => 1, 'nom' => 'Cotonou', 'id_departement' => '1',    'statut' => '1']);
        
//        //2 Atlantique
        Commune::create(['id' => 2, 'nom' => 'Abomey-Calavi', 'id_departement' => '2',    'statut' => '1']);
        Commune::create(['id' => 3, 'nom' => 'Allada', 'id_departement' => '2',    'statut' => '1']);
        Commune::create(['id' => 4, 'nom' => 'Kpomassè', 'id_departement' => '2',    'statut' => '1']);
        Commune::create(['id' => 5, 'nom' => 'Ouidah', 'id_departement' => '2',    'statut' => '1']);
        Commune::create(['id' => 6, 'nom' => 'Sô-Ava', 'id_departement' => '2',    'statut' => '0']);
        Commune::create(['id' => 7, 'nom' => 'Toffo', 'id_departement' => '2',    'statut' => '1']);
        Commune::create(['id' => 8, 'nom' => 'Tori-Bossito', 'id_departement' => '2',    'statut' => '1']);
        Commune::create(['id' => 9, 'nom' => 'Zè', 'id_departement' => '2',    'statut' => '1']);
        
//        //3 Ouémé
        Commune::create(['id' => 10, 'nom' => 'Adjarra', 'id_departement' => '3',    'statut' => '1']);
        Commune::create(['id' => 11, 'nom' => 'Adjohoun', 'id_departement' => '3',    'statut' => '1']);
        Commune::create(['id' => 12, 'nom' => 'Aguégués', 'id_departement' => '3',    'statut' => '0']);
        Commune::create(['id' => 13, 'nom' => 'Akpro-Missérété', 'id_departement' => '3',    'statut' => '1']);
        Commune::create(['id' => 14, 'nom' => 'Avrankou', 'id_departement' => '3',    'statut' => '1']);
        Commune::create(['id' => 15, 'nom' => 'Bonou', 'id_departement' => '3',    'statut' => '1']);
        Commune::create(['id' => 16, 'nom' => 'Dangbo', 'id_departement' => '3',    'statut' => '1']);
        Commune::create(['id' => 17, 'nom' => 'Porto Novo', 'id_departement' => '3',    'statut' => '1']);
        Commune::create(['id' => 18, 'nom' => 'Sèmè-Kpodji', 'id_departement' => '3',    'statut' => '1']);
        
        //4 Plateau
        Commune::create(['id' => 19, 'nom' => 'Ifangni', 'id_departement' => '4',    'statut' => '1']);
        Commune::create(['id' => 20, 'nom' => 'Adja-Ouèrè', 'id_departement' => '4',    'statut' => '1']);
        Commune::create(['id' => 21, 'nom' => 'Kétou', 'id_departement' => '4',    'statut' => '1']);
        Commune::create(['id' => 22, 'nom' => 'Pobè', 'id_departement' => '4',    'statut' => '1']);
        Commune::create(['id' => 23, 'nom' => 'Sakété', 'id_departement' => '4',    'statut' => '1']);
        
//        //5 Zou
        Commune::create(['id' => 24, 'nom' => 'Abomey', 'id_departement' => '5',    'statut' => '1']);
        Commune::create(['id' => 25, 'nom' => 'Agbangnizoun', 'id_departement' => '5',    'statut' => '1']);
        Commune::create(['id' => 26, 'nom' => 'Bohicon', 'id_departement' => '5',    'statut' => '1']);
        Commune::create(['id' => 27, 'nom' => 'Cové', 'id_departement' => '5',    'statut' => '1']);
        Commune::create(['id' => 28, 'nom' => 'Djidja', 'id_departement' => '5',    'statut' => '1']);
        Commune::create(['id' => 29, 'nom' => 'Ouinhi', 'id_departement' => '5',    'statut' => '1']);
        Commune::create(['id' => 30, 'nom' => 'Za-Kpota', 'id_departement' => '5',    'statut' => '1']);
        Commune::create(['id' => 31, 'nom' => 'Zangnanado', 'id_departement' => '5',    'statut' => '1']);
        Commune::create(['id' => 32, 'nom' => 'Zogbodomey', 'id_departement' => '5',    'statut' => '1']);
        
//        //6 Coline
        Commune::create(['id' => 33, 'nom' => 'Bantè', 'id_departement' => '6',    'statut' => '1']);
        Commune::create(['id' => 34, 'nom' => 'Dassa-Zoumè', 'id_departement' => '6',    'statut' => '1']);
        Commune::create(['id' => 35, 'nom' => 'Glazoué', 'id_departement' => '6',    'statut' => '1']);
        Commune::create(['id' => 36, 'nom' => 'Ouèssè', 'id_departement' => '6',    'statut' => '1']);
        Commune::create(['id' => 37, 'nom' => 'Savalou', 'id_departement' => '6',    'statut' => '1']);
        Commune::create(['id' => 38, 'nom' => 'Savé', 'id_departement' => '6',    'statut' => '1']);
        
//        //7 Mono
        Commune::create(['id' => 39, 'nom' => 'Athiémé', 'id_departement' => '7',    'statut' => '1']);
        Commune::create(['id' => 40, 'nom' => 'Bopa', 'id_departement' => '7',    'statut' => '1']);
        Commune::create(['id' => 41, 'nom' => 'Comé', 'id_departement' => '7',    'statut' => '1']);
        Commune::create(['id' => 42, 'nom' => 'Grand-Popo', 'id_departement' => '7',    'statut' => '1']);
        Commune::create(['id' => 43, 'nom' => 'Houéyogbé', 'id_departement' => '7',    'statut' => '1']);
        Commune::create(['id' => 44, 'nom' => 'Lokossa', 'id_departement' => '7',    'statut' => '1']);
        
        //8 Couffo
        Commune::create(['id' => 45, 'nom' => 'Aplahoué', 'id_departement' => '8',    'statut' => '1']);
        Commune::create(['id' => 46, 'nom' => 'Djakotomey', 'id_departement' => '8',    'statut' => '1']);
        Commune::create(['id' => 47, 'nom' => 'Klouékanmè', 'id_departement' => '8',    'statut' => '1']);
        Commune::create(['id' => 48, 'nom' => 'Lalo', 'id_departement' => '8',    'statut' => '1']);
        Commune::create(['id' => 49, 'nom' => 'Toviklin', 'id_departement' => '8',    'statut' => '1']);
        Commune::create(['id' => 50, 'nom' => 'Dogbo-Tota', 'id_departement' => '8',    'statut' => '1']);
        
        //9 Borgou
        Commune::create(['id' => 51, 'nom' => 'Bembèrèkè', 'id_departement' => '9',    'statut' => '1']);
        Commune::create(['id' => 52, 'nom' => 'Kalalé', 'id_departement' => '9',    'statut' => '1']);
        Commune::create(['id' => 53, 'nom' => 'N\'Dali', 'id_departement' => '9',    'statut' => '1']);
        Commune::create(['id' => 54, 'nom' => 'Nikki', 'id_departement' => '9',    'statut' => '1']);
        Commune::create(['id' => 55, 'nom' => 'Parakou', 'id_departement' => '9',    'statut' => '1']);
        Commune::create(['id' => 56, 'nom' => 'Pèrèrè', 'id_departement' => '9',    'statut' => '1']);
        Commune::create(['id' => 57, 'nom' => 'Sinendé', 'id_departement' => '9',    'statut' => '1']);
        Commune::create(['id' => 58, 'nom' => 'Tchaourou', 'id_departement' => '9',    'statut' => '1']);

        //10 Alibori
        Commune::create(['id' => 59, 'nom' => 'Banikoara', 'id_departement' => '10',    'statut' => '1']);
        Commune::create(['id' => 60, 'nom' => 'Gogounou', 'id_departement' => '10',    'statut' => '1']);
        Commune::create(['id' => 61, 'nom' => 'Kandi', 'id_departement' => '10',    'statut' => '1']);
        Commune::create(['id' => 62, 'nom' => 'Karimama', 'id_departement' => '10',    'statut' => '1']);
        Commune::create(['id' => 63, 'nom' => 'Malanville', 'id_departement' => '10',    'statut' => '1']);
        Commune::create(['id' => 64, 'nom' => 'Segbana', 'id_departement' => '10',    'statut' => '1']);
        
        //11 Atacora
        Commune::create(['id' => 65, 'nom' => 'Boukoumbé', 'id_departement' => '11',    'statut' => '1']);
        Commune::create(['id' => 66, 'nom' => 'Cobly', 'id_departement' => '11',    'statut' => '1']);
        Commune::create(['id' => 67, 'nom' => 'Kérou', 'id_departement' => '11',    'statut' => '1']);
        Commune::create(['id' => 68, 'nom' => 'Kouandé', 'id_departement' => '11',    'statut' => '1']);
        Commune::create(['id' => 69, 'nom' => 'Matéri', 'id_departement' => '11',    'statut' => '1']);
        Commune::create(['id' => 70, 'nom' => 'Natitingou', 'id_departement' => '11',    'statut' => '1']);
        Commune::create(['id' => 71, 'nom' => 'Pehonko', 'id_departement' => '11',    'statut' => '1']);
        Commune::create(['id' => 72, 'nom' => 'Tanguiéta', 'id_departement' => '11',    'statut' => '1']);
        Commune::create(['id' => 73, 'nom' => 'Toucountouna', 'id_departement' => '11',    'statut' => '1']);
        
//        //12 Donga
        Commune::create(['id' => 74, 'nom' => 'Bassila', 'id_departement' => '12',    'statut' => '1']);
        Commune::create(['id' => 75, 'nom' => 'Copargo', 'id_departement' => '12',    'statut' => '1']);
        Commune::create(['id' => 76, 'nom' => 'Djougou Rural', 'id_departement' => '12',    'statut' => '0']);
        Commune::create(['id' => 77, 'nom' => 'Ouaké', 'id_departement' => '12',    'statut' => '1']);
        Commune::create(['id' => 78, 'nom' => 'Djougou', 'id_departement' => '12',    'statut' => '1']);
        
        
       
        

        
        
    }
}