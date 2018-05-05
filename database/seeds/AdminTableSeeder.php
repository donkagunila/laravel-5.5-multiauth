<?php


use App\Admin;

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Admin::truncate();

    	Admin::create([
    		'name' => 'Admin',
    		'email' => 'admin@gmail.com',
    		'password' => bcrypt('password'),
    	]);
        
    }
}
