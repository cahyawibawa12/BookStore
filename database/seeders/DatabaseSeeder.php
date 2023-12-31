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
        // \App\Models\User::factory(10)->create();
        \App\Models\Author::factory(100)->create();
        \App\Models\BookCategory::factory(300)->create();
        \App\Models\Book::factory(10000)->create();
        \App\Models\Rating::factory(50000)->create();
    }
}
