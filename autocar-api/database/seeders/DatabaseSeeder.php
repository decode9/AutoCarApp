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
        $this->call(RegionTableSeeder::class);
        $this->call(ConcessionaireTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
