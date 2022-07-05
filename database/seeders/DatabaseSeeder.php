<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TaskSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TaskGroupSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            TaskSeeder::class,
            TaskGroupSeeder::class,
            UserSeeder::class,
        ]);
    }
}
