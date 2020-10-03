<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        DB::table('games')->insert([
            'name' => "Mobile Legend",
            'platform' => "mobile",
            'icon_url' => $faker->image(public_path('images/game_icon/'), true, true, null, false),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('games')->insert([
            'name' => "PUBG Mobile",
            'platform' => "mobile",
            'icon_url' => $faker->image(public_path('images/game_icon/'), true, true, null, false),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
