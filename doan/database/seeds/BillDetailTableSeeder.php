<?php
use Illuminate\Database\Seeder;

class BillDetailTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bill_detail')->insert([
            'billID'=>'00',
            'shoesID'=>'shoes00',
            'amount'=>'2000000',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('bill_detail')->insert([
            'billID'=>'01',
            'shoesID'=>'shoes01',
            'amount'=>'3000000',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('bill_detail')->insert([
            'billID'=>'02',
            'shoesID'=>'shoes02',
            'amount'=>'4000000',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}