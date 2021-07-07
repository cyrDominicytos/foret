<?php

use Backpack\Settings\app\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('settings')->delete();
                
        Setting::create([
            'name' => 'Devise', 
            'description' => 'Devise',
            'key' => 'devise',
            'value' => '{"AFGHANI": "AFGHANI", "ARIARY": "ARIARY", "BAHT": "BAHT", "BALBOA": "BALBOA", "BIRR": "BIRR", "BOLIVAR FUERTE": "BOLIVAR FUERTE", "BOLIVIANO": "BOLIVIANO", "CEDI": "CEDI", "COLON": "COLON", "CORDOBA": "CORDOBA", "COURONNE": "COURONNE", "DALASI": "DALASI", "DENAR": "DENAR", "DINAR": "DINAR", "DIRHAM": "DIRHAM", "DOBRA": "DOBRA", "DOLLAR": "DOLLAR", "DONG": "DONG", "DRAM": "DRAM", "ESCUDO": "ESCUDO", "EURO": "EURO", "F CFA": "F CFA", "FLORIN": "FLORIN", "FORINT": "FORINT", "FRANC": "FRANC", "GOURDE": "GOURDE", "GUARANI": "GUARANI", "HRYVNIA": "HRYVNIA", "KINA": "KINA", "KIP": "KIP", "KUNA": "KUNA", "KWACHA": "KWACHA", "KWANZA": "KWANZA", "KYAT": "KYAT", "LARI": "LARI", "LEK": "LEK", "LEMPIRA": "LEMPIRA", "LEONE": "LEONE", "LEU": "LEU", "LEV": "LEV", "LILANGENI": "LILANGENI", "LITAS": "LITAS", "LIVRE": "LIVRE", "LOTI": "LOTI", "MANAT": "MANAT", "MARK": "MARK", "METICAL": "METICAL", "NAIRA": "NAIRA", "NAKFA": "NAKFA", "NGULTRUM": "NGULTRUM", "OUGUIYA": "OUGUIYA", "PA’ANGA": "PA’ANGA", "PATACA": "PATACA", "PESO": "PESO", "PULA": "PULA", "QUETZAL": "QUETZAL", "RAND": "RAND", "REAL": "REAL", "RIAL": "RIAL", "RIEL": "RIEL", "RINGGIT": "RINGGIT", "RIYAL": "RIYAL", "ROUBLE": "ROUBLE", "ROUPIE": "ROUPIE", "RUFIYAA": "RUFIYAA", "SHEKEL": "SHEKEL", "SHILLING": "SHILLING", "SOL": "SOL", "SOM": "SOM", "SOMONI": "SOMONI", "SUM": "SUM", "TAKA": "TAKA", "TALA": "TALA", "TENGE": "TENGE", "TUGRIK": "TUGRIK", "VATU": "VATU", "WON": "WON", "YEN": "YEN", "YUAN": "YUAN", "ZLOTY": "ZLOTY", "$ CAN": "$ CAN", "$ US": "$ US", "FRW": "FRW"}', 
            'field' => '{"name":"value","label":"Valeur","type":"textarea"}',
            'active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);        
        
    }
}
