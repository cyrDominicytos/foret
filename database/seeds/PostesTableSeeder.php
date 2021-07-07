<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Poste;

class PostesTableSeeder extends Seeder {

    public function run() {
        DB::table('postes')->delete();

        //Postes Forestiers
        Poste::create(['id' => 1, 'nom' => 'Poste Forestier de Goumouri', 'id_commune' => '59', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 2, 'nom' => 'Poste Forestier de Founougo', 'id_commune' => '59', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 3, 'nom' => 'Poste Forestier de Sori', 'id_commune' => '60', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 4, 'nom' => 'Poste Forestier de Zougou-Pantrossi', 'id_commune' => '60', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 5, 'nom' => 'Poste Forestier de Sonsoro', 'id_commune' => '61', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 6, 'nom' => 'Poste Forestier de Bensékou', 'id_commune' => '61', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 7, 'nom' => 'Poste Forestier de Kompa', 'id_commune' => '62', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 8, 'nom' => 'Poste Forestier de Guéné', 'id_commune' => '63', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 9, 'nom' => 'Poste Forestier de Lougou', 'id_commune' => '64', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 10, 'nom' => 'Poste Forestier de Libantè', 'id_commune' => '64', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 11, 'nom' => 'Poste Forestier de Firou', 'id_commune' => '67', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 12, 'nom' => 'Poste Forestier de Guilmaro', 'id_commune' => '68', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 13, 'nom' => 'Poste Forestier de Perma', 'id_commune' => '70', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 14, 'nom' => 'Poste Forestier de Gnémasson', 'id_commune' => '71', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 15, 'nom' => 'Poste Forestier de Tobré', 'id_commune' => '71', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 16, 'nom' => 'Poste Forestier de Ouédo', 'id_commune' => '2', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 17, 'nom' => 'Poste Forestier de Zinvié', 'id_commune' => '2', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 18, 'nom' => 'Poste Forestier de Cotonou 1 (1 à 4)', 'id_commune' => '1', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 19, 'nom' => 'Poste Forestier de Cotonou 2 (9 à 13)', 'id_commune' => '1', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 20, 'nom' => 'Poste Forestier de Pahou', 'id_commune' => '5', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 21, 'nom' => 'Poste Forestier de Sèhouè', 'id_commune' => '7', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 22, 'nom' => 'Poste Forestier de Djigbé', 'id_commune' => '9', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 23, 'nom' => 'Poste Forestier de Gamia', 'id_commune' => '51', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 24, 'nom' => 'Poste Forestier de Ina', 'id_commune' => '51', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 25, 'nom' => 'Poste Forestier de Dounkassa', 'id_commune' => '52', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 26, 'nom' => 'Poste Forestier de Bori', 'id_commune' => '53', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 27, 'nom' => 'Poste Forestier de Sirarou', 'id_commune' => '53', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 28, 'nom' => 'Poste Forestier de Biro', 'id_commune' => '54', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 29, 'nom' => 'Poste Forestier de Parakou 2 et 3', 'id_commune' => '55', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 30, 'nom' => 'Poste Forestier de Fo-Bouré', 'id_commune' => '57', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 31, 'nom' => 'Poste Forestier de Wari-Maro', 'id_commune' => '58', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 32, 'nom' => 'Poste Forestier de Alafiarou', 'id_commune' => '58', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 33, 'nom' => 'Poste Forestier de Bétérou', 'id_commune' => '58', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 34, 'nom' => 'Poste Forestier de Kika', 'id_commune' => '58', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 35, 'nom' => 'Poste Forestier de Gouka', 'id_commune' => '33', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 36, 'nom' => 'Poste Forestier de Pira', 'id_commune' => '33', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 37, 'nom' => 'Poste Forestier de Paouignan', 'id_commune' => '34', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 38, 'nom' => 'Poste Forestier de Soclogbo', 'id_commune' => '34', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 39, 'nom' => 'Poste Forestier de Aklamkpa', 'id_commune' => '35', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 40, 'nom' => 'Poste Forestier de Djègbé', 'id_commune' => '36', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 41, 'nom' => 'Poste Forestier de Tchalla-Ogoi', 'id_commune' => '36', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 42, 'nom' => 'Poste Forestier de Ikèmon', 'id_commune' => '36', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 43, 'nom' => 'Poste Forestier de Logozohè', 'id_commune' => '37', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 44, 'nom' => 'Poste Forestier de Doumè', 'id_commune' => '37', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 45, 'nom' => 'Poste Forestier de Tchètti', 'id_commune' => '37', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 46, 'nom' => 'Poste Forestier de Kaboua', 'id_commune' => '38', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 47, 'nom' => 'Poste Forestier de Oké-Owo', 'id_commune' => '38', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 48, 'nom' => 'Poste Forestier de Pénessoullou', 'id_commune' => '74', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 49, 'nom' => 'Poste Forestier de Manigri', 'id_commune' => '74', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 50, 'nom' => 'Poste Forestier de Igbomacro', 'id_commune' => '74', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 51, 'nom' => 'Poste Forestier de Wannou', 'id_commune' => '74', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 52, 'nom' => 'Poste Forestier de Krékété', 'id_commune' => '74', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 53, 'nom' => 'Poste Forestier de Toko-Toko', 'id_commune' => '78', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 54, 'nom' => 'Poste Forestier de Béléfoungou', 'id_commune' => '78', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 55, 'nom' => 'Poste Forestier de Bougou', 'id_commune' => '78', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 56, 'nom' => 'Poste Forestier de Patargo', 'id_commune' => '78', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 57, 'nom' => 'Poste Forestier de Atomey', 'id_commune' => '45', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 58, 'nom' => 'Poste Forestier de Ikpinlè', 'id_commune' => '20', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 59, 'nom' => 'Poste Forestier de Idigny', 'id_commune' => '21', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 60, 'nom' => 'Poste Forestier de Issaba', 'id_commune' => '22', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 61, 'nom' => 'Poste Forestier de Porto 1-4', 'id_commune' => '17', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 62, 'nom' => 'Poste Forestier de Djrègbé', 'id_commune' => '18', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 63, 'nom' => 'Poste Forestier de Sodohomè', 'id_commune' => '26', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 64, 'nom' => 'Poste Forestier de Sètto', 'id_commune' => '28', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 65, 'nom' => 'Poste Forestier de Monsourou', 'id_commune' => '28', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 66, 'nom' => 'Poste Forestier de Agouna', 'id_commune' => '28', 'type' => '106', 'statut' => '1']);
        Poste::create(['id' => 67, 'nom' => 'Poste Forestier de Massi', 'id_commune' => '32', 'type' => '106', 'statut' => '1']);

        //Sections communales ========================================================================= 
        $section = Poste::create(['id' => 68, 'nom' => 'Section communale de Banikoara', 'id_commune' => '59', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([1,2]);//postes forestiers
        
        $section = Poste::create(['id' => 69, 'nom' => 'Section communale de Gogounou', 'id_commune' => '60', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([3,4]);//postes forestiers
        
        $section = Poste::create(['id' => 70, 'nom' => 'Section communale de Kandi', 'id_commune' => '61', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([5,6]);//postes forestiers
        
        $section = Poste::create(['id' => 71, 'nom' => 'Section communale de Karimama', 'id_commune' => '62', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([7]);//postes forestiers
        
        $section = Poste::create(['id' => 72, 'nom' => 'Section communale de Malanville', 'id_commune' => '63', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([8]);//postes forestiers
        
        $section = Poste::create(['id' => 73, 'nom' => 'Section communale de Ségbana', 'id_commune' => '64', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([9,10]);//postes forestiers
        
        $section = Poste::create(['id' => 74, 'nom' => 'Section communale de Boukoumbé', 'id_commune' => '65', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 75, 'nom' => 'Section communale de Cobly', 'id_commune' => '66', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 76, 'nom' => 'Section communale de Kérou', 'id_commune' => '67', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([11]);//postes forestiers
        
        $section = Poste::create(['id' => 77, 'nom' => 'Section communale de Kouandé', 'id_commune' => '68', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([12]);//postes forestiers
        
        $section = Poste::create(['id' => 78, 'nom' => 'Section communale de Matéri', 'id_commune' => '69', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 79, 'nom' => 'Section communale de Natitingou', 'id_commune' => '70', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([13]);//postes forestiers
        
        $section = Poste::create(['id' => 80, 'nom' => 'Section communale de Péhonco', 'id_commune' => '71', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([14,15]);//postes forestiers
        
        $section = Poste::create(['id' => 81, 'nom' => 'Section communale de Tanguiéta', 'id_commune' => '72', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 82, 'nom' => 'Section communale de Toucountouna', 'id_commune' => '73', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 83, 'nom' => 'Section communale de Abomey-Calavi, Sô-Ava', 'id_commune' => '2', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([16,17]);//postes forestiers
        
        $section = Poste::create(['id' => 84, 'nom' => 'Section communale de Allada', 'id_commune' => '3', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 85, 'nom' => 'Section communale de Cotonou', 'id_commune' => '1', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([18,19]);//postes forestiers
        
        $section = Poste::create(['id' => 86, 'nom' => 'Section communale de Kpomassè', 'id_commune' => '4', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 87, 'nom' => 'Section communale de Ouidah', 'id_commune' => '5', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([20]);//postes forestiers
        
        $section = Poste::create(['id' => 88, 'nom' => 'Section communale de Toffo', 'id_commune' => '7', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([21]);//postes forestiers
        
        $section = Poste::create(['id' => 89, 'nom' => 'Section communale de Tori-Bossito', 'id_commune' => '8', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 90, 'nom' => 'Section communale de Zè', 'id_commune' => '9', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([22]);//postes forestiers
        
        $section = Poste::create(['id' => 91, 'nom' => 'Section communale de Bembèrèkè', 'id_commune' => '51', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([23,24]);//postes forestiers
        
        $section = Poste::create(['id' => 92, 'nom' => 'Section communale de kalalé', 'id_commune' => '52', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([25]);//postes forestiers
        
        $section = Poste::create(['id' => 93, 'nom' => 'Section communale de N\'dali', 'id_commune' => '53', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([26,27]);//postes forestiers
        
        $section = Poste::create(['id' => 94, 'nom' => 'Section communale de Nikki', 'id_commune' => '54', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([28]);//postes forestiers
        
        $section = Poste::create(['id' => 95, 'nom' => 'Section communale de Parakou', 'id_commune' => '55', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([29]);//postes forestiers
        
        $section = Poste::create(['id' => 96, 'nom' => 'Section communale de Pèrèrè', 'id_commune' => '56', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 97, 'nom' => 'Section communale de Sinendé', 'id_commune' => '57', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([30]);//postes forestiers
        
        $section = Poste::create(['id' => 98, 'nom' => 'Section communale de Tchaourou', 'id_commune' => '58', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([31,32,33,34]);//postes forestiers
        
        $section = Poste::create(['id' => 99, 'nom' => 'Section communale de Bantè', 'id_commune' => '33', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([35,36]);//postes forestiers
        
        $section = Poste::create(['id' => 100, 'nom' => 'Section communale de Savè', 'id_commune' => '38', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([46,47]);//postes forestiers
        
        $section = Poste::create(['id' => 101, 'nom' => 'Section communale de Dassa-Zoumè', 'id_commune' => '34', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([37,38]);//postes forestiers
        
        $section = Poste::create(['id' => 102, 'nom' => 'Section communale de Glazoué', 'id_commune' => '35', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([39]);//postes forestiers
        
        $section = Poste::create(['id' => 103, 'nom' => 'Section communale de Ouèssè', 'id_commune' => '36', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([40,41,42]);//postes forestiers
        
        $section = Poste::create(['id' => 104, 'nom' => 'Section communale de Savalou', 'id_commune' => '37', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([43,44,45]);//postes forestiers
        
        $section = Poste::create(['id' => 105, 'nom' => 'Section communale de Bassila', 'id_commune' => '74', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([48,49,50,51,52]);//postes forestiers
        
        $section = Poste::create(['id' => 106, 'nom' => 'Section communale de Copargo', 'id_commune' => '75', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 107, 'nom' => 'Section communale de Djougou', 'id_commune' => '78', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([53,54,55,56]);//postes forestiers
        
        $section = Poste::create(['id' => 108, 'nom' => 'Section communale de Ouaké', 'id_commune' => '77', 'type' => '105', 'statut' => '1']);      
        $section = Poste::create(['id' => 109, 'nom' => 'Section communale de Aplahoué', 'id_commune' => '45', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([57]);//postes forestiers
        
        $section = Poste::create(['id' => 110, 'nom' => 'Section communale de Atiemé', 'id_commune' => '39', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 111, 'nom' => 'Section communale de Bopa', 'id_commune' => '40', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 112, 'nom' => 'Section communale de Comé', 'id_commune' => '41', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 113, 'nom' => 'Section communale de Djakotomey', 'id_commune' => '46', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 114, 'nom' => 'Section communale de Dogbo', 'id_commune' => '50', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 115, 'nom' => 'Section communale de Grand-Popo', 'id_commune' => '42', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 116, 'nom' => 'Section communale de Houéyogbé ', 'id_commune' => '43', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 117, 'nom' => 'Section communale de Klouékanmè ', 'id_commune' => '47', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 118, 'nom' => 'Section communale de Lalo', 'id_commune' => '48', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 119, 'nom' => 'Section communale de Lokossa', 'id_commune' => '44', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 120, 'nom' => 'Section communale de Toviklin', 'id_commune' => '49', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 121, 'nom' => 'Section communale de Adja-Ouèrè', 'id_commune' => '20', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([58]);//postes forestiers
        
        $section = Poste::create(['id' => 122, 'nom' => 'Section communale de Adjarra', 'id_commune' => '10', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 123, 'nom' => 'Section communale de Adjohoun', 'id_commune' => '11', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 124, 'nom' => 'Section communale de Akpro-Missérété', 'id_commune' => '13', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 125, 'nom' => 'Section communale de Avrankou', 'id_commune' => '14', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 126, 'nom' => 'Section communale de Bonou', 'id_commune' => '15', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 127, 'nom' => 'Section communale de Dangbo', 'id_commune' => '16', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 128, 'nom' => 'Section communale de Ifangni', 'id_commune' => '19', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 129, 'nom' => 'Section communale de Kétou', 'id_commune' => '21', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([59]);//postes forestiers
        
        $section = Poste::create(['id' => 130, 'nom' => 'Section communale de Pobè', 'id_commune' => '22', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([60]);//postes forestiers
        
        $section = Poste::create(['id' => 131, 'nom' => 'Section communale de Porto-Novo', 'id_commune' => '17', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([61]);//postes forestiers
        
        $section = Poste::create(['id' => 132, 'nom' => 'Section communale de Sakété', 'id_commune' => '23', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 133, 'nom' => 'Section communale de Sèmè-Kpodji', 'id_commune' => '18', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([62]);//postes forestiers
        
        $section = Poste::create(['id' => 134, 'nom' => 'Section communale de Abomey', 'id_commune' => '24', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 135, 'nom' => 'Section communale de Agbangnizoun', 'id_commune' => '25', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 136, 'nom' => 'Section communale de Bohicon', 'id_commune' => '26', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([63]);//postes forestiers
        
        $section = Poste::create(['id' => 137, 'nom' => 'Section communale de Covè', 'id_commune' => '27', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 138, 'nom' => 'Section communale de Djidja', 'id_commune' => '28', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([64,65,66]);//postes forestiers
        
        $section = Poste::create(['id' => 139, 'nom' => 'Section communale de Ouinhi', 'id_commune' => '29', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 140, 'nom' => 'Section communale de Zagnanado', 'id_commune' => '31', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 141, 'nom' => 'Section communale de Za-Kpota', 'id_commune' => '30', 'type' => '105', 'statut' => '1']);
        $section = Poste::create(['id' => 142, 'nom' => 'Section communale de Zogbodomey', 'id_commune' => '32', 'type' => '105', 'statut' => '1']);
        $section->postesFils()->attach([67]);//postes forestiers
        
        //Cantonnements =====================================================================
        $cantonnement = Poste::create(['id' => 143, 'nom' => 'Cantonnement de Pehonko', 'id_commune' => '71', 'type' => '104', 'statut' => '1']);
        $cantonnement->postesFils()->attach([76,77,80]);//sections communales
        $cantonnement->postesFils()->attach([11,12,14,15]);//postes forestiers
        
        $cantonnement = Poste::create(['id' => 144, 'nom' => 'Cantonnement de Nikki', 'id_commune' => '54', 'type' => '104', 'statut' => '1']);
        $cantonnement->postesFils()->attach([94]);//sections communales
        $cantonnement->postesFils()->attach([28]);//postes forestiers
        
        $cantonnement = Poste::create(['id' => 145, 'nom' => 'Cantonnement de Savè', 'id_commune' => '38', 'type' => '104', 'statut' => '1']);
        $cantonnement->postesFils()->attach([100]);//sections communales
        $cantonnement->postesFils()->attach([46,47]);//postes forestiers
        
        $cantonnement = Poste::create(['id' => 146, 'nom' => 'Cantonnement de Bassila', 'id_commune' => '74', 'type' => '104', 'statut' => '1']);
        $cantonnement->postesFils()->attach([105]);//sections communales
        $cantonnement->postesFils()->attach([48,49,50,51,52]);//postes forestiers
        
        $cantonnement = Poste::create(['id' => 147, 'nom' => 'Cantonnement de Aplahoué', 'id_commune' => '45', 'type' => '104', 'statut' => '1']);
        $cantonnement->postesFils()->attach([109,113,114,117,118,120]);//sections communales
        $cantonnement->postesFils()->attach([]);//postes forestiers
        
        $cantonnement = Poste::create(['id' => 148, 'nom' => 'Cantonnement de Kétou', 'id_commune' => '21', 'type' => '104', 'statut' => '1']);
        $cantonnement->postesFils()->attach([121,128,129,130,132]);//sections communales
        $cantonnement->postesFils()->attach([58,59,60]);//postes forestiers
        
        $cantonnement = Poste::create(['id' => 149, 'nom' => 'Cantonnement de Djidja', 'id_commune' => '28', 'type' => '104', 'statut' => '1']);
        $cantonnement->postesFils()->attach([138]);//sections communales
        $cantonnement->postesFils()->attach([64,65,66]);//postes forestiers
        
        //Inspections Forestières =============================================================        
        $inspection = Poste::create(['id' => 150, 'nom' => 'Inspection Forestière de l\'Alibori', 'id_commune' => '61', 'type' => '103', 'statut' => '1']);        
        $inspection->postesFils()->attach([]);//cantonnements
        $inspection->postesFils()->attach([68,69,70,71,72,73]);//sections communales
        $inspection->postesFils()->attach([1,2,3,4,5,6,7,8,9,10]);//postes forestiers
        
        $inspection = Poste::create(['id' => 151, 'nom' => 'Inspection Forestière de l\'ATACORA', 'id_commune' => '70', 'type' => '103', 'statut' => '1']);
        $inspection->postesFils()->attach([143]);//cantonnements
        $inspection->postesFils()->attach([74,75,76,77,78,79,80,81,82]);//sections communales
        $inspection->postesFils()->attach([11,12,13,14,15]);//postes forestiers
        
        $inspection = Poste::create(['id' => 152, 'nom' => 'Inspection Forestière de l\'Atlantique-littoral', 'id_commune' => '1', 'type' => '103', 'statut' => '1']);
        $inspection->postesFils()->attach([]);//cantonnements
        $inspection->postesFils()->attach([83,84,85,86,87,88,89,90]);//sections communales
        $inspection->postesFils()->attach([16,17,18,19,20,21,22]);//postes forestiers
        
        $inspection = Poste::create(['id' => 153, 'nom' => 'Inspection Forestière du Borgou', 'id_commune' => '55', 'type' => '103', 'statut' => '1']);
        $inspection->postesFils()->attach([144]);//cantonnements
        $inspection->postesFils()->attach([91,92,93,94,95,96,97,98]);//sections communales
        $inspection->postesFils()->attach([23,24,25,26,27,28,29,30,31,32,33,34]);//postes forestiers
        
        $inspection = Poste::create(['id' => 154, 'nom' => 'Inspection Forestière des Collines', 'id_commune' => '38', 'type' => '103', 'statut' => '1']);
        $inspection->postesFils()->attach([145]);//cantonnements
        $inspection->postesFils()->attach([99,100,101,102,103,104]);//sections communales
        $inspection->postesFils()->attach([35,36,37,38,39,40,41,42,43,44,45,46,47]);//postes forestiers
        
        $inspection = Poste::create(['id' => 155, 'nom' => 'Inspection Forestière de la Donga', 'id_commune' => '76', 'type' => '103', 'statut' => '1']);
        $inspection->postesFils()->attach([146]);//cantonnements
        $inspection->postesFils()->attach([105,106,107,108]);//sections communales
        $inspection->postesFils()->attach([48,49,50,51,52,53,54,55,56]);//postes forestiers
        
        $inspection = Poste::create(['id' => 156, 'nom' => 'Inspection Forestière du Mono-Couffo', 'id_commune' => '44', 'type' => '103', 'statut' => '1']);
        $inspection->postesFils()->attach([147]);//cantonnements
        $inspection->postesFils()->attach([109,110,111,112,113,114,115,120]);//sections communales
        $inspection->postesFils()->attach([57]);//postes forestiers
        
        $inspection = Poste::create(['id' => 157, 'nom' => 'Inspection Forestière de l’Ouémé-plateau', 'id_commune' => '17', 'type' => '103', 'statut' => '1']);
        $inspection->postesFils()->attach([148]);//cantonnements
        $inspection->postesFils()->attach([121,122,123,124,125,126,127,128,129,130,131,132,133]);//sections communales
        $inspection->postesFils()->attach([58,59,60,61,62]);//postes forestiers
        
        $inspection = Poste::create(['id' => 158, 'nom' => 'Inspection Forestière  du Zou', 'id_commune' => '24', 'type' => '103', 'statut' => '1']);
        $inspection->postesFils()->attach([149]);//cantonnements
        $inspection->postesFils()->attach([134,135,136,137,138,139,140,141,142]);//sections communales
        $inspection->postesFils()->attach([63,64,65,66,67]);//postes forestiers
        
        //Brigarde spéciale =========================================================================
        $bfsp = Poste::create(['id' => 159, 'nom' => 'Brigade Forestière Spéciale du Port', 'id_commune' => '1', 'type' => '107', 'statut' => '1']);
        for ($x = 1; $x <= 157; $x++) {
            $bfsp->postesFils()->attach($x);
        }
        //Directions ===================================================================================
        $direction = Poste::create(['id' => 160, 'nom' => 'Direction  du Reboisement et de l’Aménagement des Forêts', 'id_commune' => '1', 'type' => '101', 'statut' => '1']);
        for ($x = 1; $x <= 159; $x++) {
            $direction->postesFils()->attach($x);
        }
        $direction = Poste::create(['id' => 161, 'nom' => 'Direction des Politiques, du Contrôle de l\'Exploitation Forestière et du Contentieux', 'id_commune' => '1', 'type' => '102', 'statut' => '1']);
        for ($x = 1; $x <= 159; $x++) {
            $direction->postesFils()->attach($x);
        }
        $direction = Poste::create(['id' => 162, 'nom' => 'Direction Générale des Eaux Forêts et Chasse', 'id_commune' => '1', 'type' => '100', 'statut' => '1']);
        for ($x = 1; $x <= 161; $x++) {
            $direction->postesFils()->attach($x);
        }

        //Autres intervenants =======================================================================
        Poste::create(['id' => 163, 'nom' => 'Douane Spéciale du Port', 'id_commune' => '1', 'type' => '200', 'statut' => '1']);
        Poste::create(['id' => 164, 'nom' => 'Bénin Controle', 'id_commune' => '1', 'type' => '300', 'statut' => '1']);
        Poste::create(['id' => 165, 'nom' => 'Conseil National des Chargeurs du Bénin', 'id_commune' => '1', 'type' => '400', 'statut' => '1']);
    }

}
