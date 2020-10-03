<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('events')->insert([
            'title' => $faker->unique()->jobTitle,
            'status' => 1,
            'participant' => 10,
            'banner_url' => $faker->image(public_path('images/events/'), true, true, null, false),
            'start_date' => now(),
            'description' => 'satu',
            'fee' => 10000,
            'prize_pool' => 10000,
            'rules' => 'free',
            'bracket_type' => 1,
            'registration_open' => now(),
            'registration_close' => now(),
            'form_message' => 'anu',
            'game_id' => 1
        ]);
        DB::table('events')->insert([
            'title' => $faker->unique()->jobTitle,
            'status' => 1,
            'participant' => 5,
            'banner_url' => $faker->image(public_path('images/events/'), true, true, null, false),
            'start_date' => now(),
            'description' => 'dua',
            'fee' => 50000,
            'prize_pool' => 50000,
            'rules' => 'free',
            'bracket_type' => 2,
            'registration_open' => now(),
            'registration_close' => now(),
            'form_message' => 'wkwkkwkkkkw',
            'game_id' => 1
        ]);
    }
}
