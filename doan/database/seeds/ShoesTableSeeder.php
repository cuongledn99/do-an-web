<?php

use Illuminate\Database\Seeder;

class ShoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoes')->insert([
            'shoesID'=>'shoes00',
            'name'=>'Boot',
            'inPrice'=>'500000',
            'outPrice'=>'750000',
            'inStock'=>'50',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('shoes')->insert([
            'shoesID'=>'shoes01',
            'name'=>'Sneaker',
            'inPrice'=>'400000',
            'outPrice'=>'60000',
            'inStock'=>'50',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('shoes')->insert([
            'shoesID'=>'shoes02',
            'name'=>'Standar',
            'inPrice'=>'600000',
            'outPrice'=>'70000',
            'inStock'=>'20',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}