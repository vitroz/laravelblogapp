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
        App\User::create([
        	'username' 		=>  'vitorvqz',
        	'email' 		=>  'vitor@mail.com',
        	'password'  	=>  bcrypt('123456'),
        ]);
    }
}
