<?php
use Illuminate\Database\Seeder;
class BillTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bill')->insert([
            'billID'=>'00',
            'createdBy'=>'minhduc',
            'updatedBy'=>'minhduc',
            'customerID'=>'1',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('bill')->insert([
            'billID'=>'01',
            'createdBy'=>'huycuong',
            'updatedBy'=>'huycuong',
            'customerID'=>'2',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('bill')->insert([
            'billID'=>'02',
            'createdBy'=>'vanhau',
            'updatedBy'=>'vanhau',
            'customerID'=>'3',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
