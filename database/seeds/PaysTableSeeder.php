<?php

use App\Models\Pay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaysTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $table = prefixe_table().'pays';
        DB::table($table)->delete();

        Eloquent::unguard();
        $path = 'database/z_import/1pays_fr.sql';
        DB::unprepared(file_get_contents($path));
        //Mise à jour des dates
        DB::unprepared('UPDATE `'.$table.'` set created_at=now(), updated_at=now();');
        
        foreach (Pay::all() as $item){
            //Ça permet d'éviter le tracking (Observer de update). Éviter Eloquent ici.
            DB::table($table)->where('id', $item->id)
                    ->update([
                        'uuid' => \Webpatser\Uuid\Uuid::generate()
                    ]);
        }
        DB::unprepared('ALTER TABLE `'.$table.'` MODIFY COLUMN uuid char(36) NOT NULL;');
    }

}
