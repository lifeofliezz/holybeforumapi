<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\TopicReaction;
use App\Models\User;
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
        Topic::factory()
            ->count(10)
            ->create();


        Topicreaction::factory()
            ->count(40)
            ->create();
    }
}
