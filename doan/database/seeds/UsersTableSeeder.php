<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'customerID'=>'1',
            'username' => 'minhduc',
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
            'fullname'=>'Tran Minh Duc',
            'address'=>'ben cau',
            'role'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
        DB::table('users')->insert([
            'customerID'=>'2',

            'username' => 'huycuong',
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
            'fullname'=>'Le Pham Huy Cuong',
            'address'=>'Da Nang',
            'role'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        DB::table('users')->insert([
            'customerID'=>'3',

            'username' => 'vanhau',
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
            'fullname'=>'Le Van Hau',
            'address'=>'DakLak',
            'role'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
