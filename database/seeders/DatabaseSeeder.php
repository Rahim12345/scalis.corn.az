<?php

namespace Database\Seeders;

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
        $this->call([
            userSeeder::class,
            MainMenuSeeder::class,
            SubOneMenuSeeder::class,
            SubTwoMenuSeeder::class,
            AboutSeeder::class,
            OptionSeeder::class,
        ]);
    }
}
