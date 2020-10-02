<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'title' => 'PROGAMERS NONGSKI I MLBB ONLINE TOURNAMENT',
            'status' => 1,
            'participant' => 10,
            'start_date' => now(),
            'description' => 'satu',
            'fee' => 10000,
            'prize_pool' => 10000,
            'rules' => 'free',
            'bracket_type' => 1,
            'registration_open' => now(),
            'registration_close' => now(),
            'form_message' => 'anu'
        ]);
        DB::table('events')->insert([
            'title' => 'PROGAMERS NONGSKI III MLBB ONLINE',
            'status' => 1,
            'participant' => 5,
            'start_date' => now(),
            'description' => 'dua',
            'fee' => 50000,
            'prize_pool' => 50000,
            'rules' => 'free',
            'bracket_type' => 2,
            'registration_open' => now(),
            'registration_close' => now(),
            'form_message' => 'wkwkkwkkkkw'
        ]);
    }
}
