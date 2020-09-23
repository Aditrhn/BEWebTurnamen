<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('friends')->insert([
            'player_one' => 1,
            'player_two' => 2,
            'status' => '1',
        ]);
        DB::table('friends')->insert([
            'player_one' => 1,
            'player_two' => 3,
            'status' => '1',
        ]);
        DB::table('friends')->insert([
            'player_one' => 2,
            'player_two' => 4,
            'status' => '1',
        ]);
        DB::table('friends')->insert([
            'player_one' => 3,
            'player_two' => 4,
            'status' => '1',
        ]);
    }
}
