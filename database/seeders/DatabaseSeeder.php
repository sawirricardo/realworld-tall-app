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
        \App\Models\User::factory(10)
            ->has(\App\Models\Article::factory()->count(10))
            ->create();

        \App\Models\Comment::factory(50)
            ->create();

        $this
            ->call(TagSeeder::class)
            ->call(ArticleTagSeeder::class);
    }
}
