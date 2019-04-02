<?php

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
      DB::table('users')->insert([
            'name' => 'Duy',
            'email' => 'duy@gmail.com',
            'password' => bcrypt('123123'),
            'phone' => '1231231231',
            'isAdmin' => 1
        ]);
      DB::table('users')->insert([
            'name' => 'Huy Duy',
            'email' => 'huyduy@gmail.com',
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
