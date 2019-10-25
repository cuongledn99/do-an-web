<?php

use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('categorys')->insert([
                'categoryID'=>'1',
                'categoryName'=>'Boot',
            ]);
            DB::table('categorys')->insert([
                'categoryID'=>'2',
                'categoryName'=>'Sneaker',
            ]);
            DB::table('categorys')->insert([
                'categoryID'=>'3',
                'categoryName'=>'DepLao',
            ]);
    }
}