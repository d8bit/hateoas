<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 200; $i++) {
            DB::table('cars')->insert([
                'registration_number' => str_random(10),
                'fk_user' => $i
            ]);
        }
    }
}
