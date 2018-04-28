<?php


use App\User;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	User::truncate();



    	for ($i=0; $i < 50; $i++) { 
	    	// create user
	        User::create([
	        	'username' => str_random(10),
	        	'email'   =>  str_random(10).'@gmail.com',
	        	'password' => bcrypt('secret'),
	        ]);
    	}
    }
}
