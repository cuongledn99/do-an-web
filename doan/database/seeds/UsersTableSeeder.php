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
            'username' => 'minhduc',
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('password'),
            'fullname'=>'Tran Minh Duc',
            'address'=>'ben cau',
            'role'=>'admin',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        
    }
}
