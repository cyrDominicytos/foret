<?php

use App\Models\Ville;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VillesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = prefixe_table().'villes';
        DB::table($table)->delete();

        Eloquent::unguard();
        $path = 'database/z_import/3villes_canada.sql'; //$path = 'database/z_import/3villes.sql';
        if(app()->environment() == 'local'){
            $path = 'database/z_import/3villes_canada.sql';
        }
        DB::unprepared(file_get_contents($path));
        //Mise à jour des dates
        DB::unprepared('UPDATE `'.$table.'` set created_at=now(), updated_at=now();');
        
        foreach (Ville::all() as $item){
            //Ça permet d'éviter le tracking (Observer de update). Éviter Eloquent ici.
            DB::table($table)->where('id', $item->id)
                    ->update([
                        'uuid' => \Webpatser\Uuid\Uuid::generate()
                    ]);
        }
        DB::unprepared('ALTER TABLE `'.$table.'` MODIFY COLUMN uuid char(36) NOT NULL;');
    }

}
