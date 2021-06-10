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
        $this->call(UsersSeeders::class);
        $this->call(TweetsSeeders::class);
        $this->call(CommentsSeeders::class);
        $this->call(RepliesSeeders::class);
    }
}
