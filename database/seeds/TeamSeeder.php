<?php

use App\Model\Team;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Team::class, 10)->create();
        // DB::table('Teams')->insert([
        //     'name' => "Team AA",
        //     'max_member' => 7,
        //     'games_id' => 1,
        //     // 'capt_id' => 1,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('Teams')->insert([
        //     'name' => "Team R",
        //     'max_member' => 6,
        //     'games_id' => 1,
        //     // 'capt_id' => 2,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('Teams')->insert([
        //     'name' => "Team G",
        //     'max_member' => 7,
        //     'games_id' => 1,
        //     // 'capt_id' => 3,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
        // DB::table('Teams')->insert([
        //     'name' => "Team AD",
        //     'max_member' => 10,
        //     'games_id' => 1,
        //     // 'capt_id' => 4,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);
    }
}
