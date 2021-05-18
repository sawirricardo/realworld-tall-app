<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Tag::create(['name' => 'Graphic Design']);
        \App\Models\Tag::create(['name' => 'Programming']);
        \App\Models\Tag::create(['name' => 'Laravel']);
        \App\Models\Tag::create(['name' => 'PHP']);
    }
}
