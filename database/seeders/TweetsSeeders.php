<?php

namespace Database\Seeders;

use App\Models\Tweet;
use Illuminate\Database\Seeder;

class TweetsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tweet::factory(25)->create();
    }
}
