<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(AdminSeeder::class);
        // $this->call(FriendSeeder::class);
        // $this->call(GameSeeder::class);
        // $this->call(PlayerSeeder::class);
        $this->call([
            PlayerSeeder::class,
            AdminSeeder::class,
            GameSeeder::class,
            FriendSeeder::class,
            // TeamSeeder::class
        ]);
    }
}
