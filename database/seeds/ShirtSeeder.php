<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShirtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shirts')-> insert ([
            'shirt_name'=>'Camiseta polo manga corta',
            'shirt_value'=>100000,
            'shirt_color'=>'Rojo',
            'category_id'=> 4,
            'status'=> true,
        ]);
        DB::table('shirts')-> insert ([
            'shirt_name'=>'Camisa con cuello manga larga',
            'shirt_value'=>105000,
            'shirt_color'=>'Blanca',
            'category_id'=> 5,
            'status'=> true,
        ]);
        DB::table('shirts')-> insert ([
            'shirt_name'=>'Esqueleto de banda de rock',
            'shirt_value'=>50000,
            'shirt_color'=>'Negro',
            'category_id'=> 6,
            'status'=> false,
        ]);
    }
}
