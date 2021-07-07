<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        
        $userS = User::create(['id' => 1, 'name' => 'App', 'firstname' => 'SuperAdmin',    'email' => 'super@eforex.com', 
            'password' => Hash::make('MotDeP@sse!'), 'email_verified_at' => Carbon::now(),]);
        $userS->assignRole(Role::super()->name, guard_admin());
        
        $userA = User::create(['id' => 2, 'name' => 'App', 'firstname' => 'Admin',    'email' => 'admin@eforex.com', 
            'password' => Hash::make('MotDeP@sse!'), 'email_verified_at' => Carbon::now(),]);
        $userA->assignRole(Role::admin()->name, guard_admin());
        
        //Ne pas utiliser BackpackUser si on ne veut pas utiliser le guard admin
                
//        $user = User::create(['id' => 3, 'name' => 'App', 'firstname' => 'Usager', 'email' => 'usager@eforex.com', 
//            'password' => Hash::make('MotDeP@sse!'), 'email_verified_at' => Carbon::now(),
////            'uuid' => \Webpatser\Uuid\Uuid::generate()
//                ]);   //Le UserObserver ne crée pas le uuid pour cet user, à comprendre
////        \Log::info(Role::intervenant());
//        $user->assignRole(Role::Usager()->name);
      
    }
}