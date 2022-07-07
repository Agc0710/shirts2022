<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')-> insert ([
            'name'=>'Manga Corta',
            'description'=>'Camiseta de menor longitud que no llega hasta el codo',
            'priority'=>5,
        ]);
        DB::table('categories')-> insert ([
            'name'=>'Manga Larga',
            'description'=>'Camisa manga larga con puño',
            'priority'=>4,
        ]);
        DB::table('categories')-> insert ([
            'name'=>'Esqueleto',
            'description'=>'Es una camisa sin mangas con cuello bajo y diferentes anchos de tirantes.',
            'priority'=>2,
        ]);
    }
}
