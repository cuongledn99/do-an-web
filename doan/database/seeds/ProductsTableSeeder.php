<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title'=>'Boot',
            'priceold'=>'200000',
            'discountpercent'=>'20',
            'created_by'=>now(),
            'updated_by'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'title'=>'Sneaker',
            'priceold'=>'500000',
            'discountpercent'=>'10',
            'created_by'=>now(),
            'updated_by'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        DB::table('products')->insert([
            'title'=>'Sneaker',
            'priceold'=>'500000',
            'discountpercent'=>'10',
            'created_by'=>now(),
            'updated_by'=>now(),
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}