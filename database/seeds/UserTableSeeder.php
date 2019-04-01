<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{ 
	//m muon t them cai gi
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// admin
        DB::table('users')->insert([
            'name' => 'Dung',
            'email' => 'dung@gmail.com',
            'password' => bcrypt('123123'), // pass
            'phone' => '1231231231',
            'isAdmin' => 1
        ]);
        //user
      DB::table('users')->insert([
            'name' => 'Dung1',
            'email' => 'dung1@gmail.com',
            'password' => bcrypt('123123'),
            'phone' => '1231231231',
        ]);
      DB::table('users')->insert([
            'name' => 'HD',
            'email' => 'hd@gmail.com',
            'password' => bcrypt('123123'),
            'phone' => '1231231231',
        ]);
    }
}
