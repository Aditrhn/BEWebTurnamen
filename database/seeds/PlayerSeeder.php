<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 80; $i++) {
            $name = $faker->firstName();
            DB::table('players')->insert([
                'name' => strtolower($name),
                'email' => strtolower($name) . '@mail.com',
                'password' => Hash::make('qwerty1234'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
