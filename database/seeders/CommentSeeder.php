<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Comment::factory(50)
            ->create();
    }
}
