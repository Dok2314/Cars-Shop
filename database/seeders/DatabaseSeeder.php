<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Good;
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
        // \App\Models\User::factory(10)->create();
        Category::factory(50)->create();
        Good::factory(500)->create();
    }
}
