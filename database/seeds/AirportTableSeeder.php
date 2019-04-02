<?php

use Illuminate\Database\Seeder;

class AirportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert([
            'airport_name' => 'Noi Bai',
            'airport_code' => 'HAN',
            'city_name' => 'Ha Noi'
        ]);

        DB::table('airports')->insert([
            'airport_name' => 'Tan Son Nhat',
            'airport_code' => 'SGN',
            'city_name' => 'Ho Chi Minh City'
        ]);

        DB::table('airports')->insert([
            'airport_name' => 'Tokyo International Airport',
            'airport_code' => 'HND',
            'city_name' => 'Tokyo'
        ]);
    }
}
