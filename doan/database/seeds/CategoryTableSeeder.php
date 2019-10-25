<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'categoryID'=>'1',
            'categoryName'=>'Boot',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('category')->insert([
            'categoryID'=>'2',
            'categoryName'=>'Sneaker',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('category')->insert([
            'categoryID'=>'3',
            'categoryName'=>'DepLao',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}