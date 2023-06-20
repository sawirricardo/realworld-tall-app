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
        $this
            ->call(ArticleSeeder::class)
            ->call(CommentSeeder::class)
            ->call(TagSeeder::class)
            ->call(ArticleTagSeeder::class);
    }
}
