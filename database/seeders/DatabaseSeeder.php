<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tweet;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->email,
                'password' => Hash::make($faker->password),
                'bio' => $faker->text,
                'birthdate' => $faker->date,
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Tweet::create([
                'body' => $faker->realText(500),
                'user_id' => $faker->numberBetween(1, 10),
                'slug' => Str::limit($faker->realText(40), 40, '...'),
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Comment::create([
                'comment' => $faker->realText(255),
                'user_id' => $faker->numberBetween(1, 10),
                'tweet_id' => $faker->numberBetween(1, 10),
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Reply::create([
                'reply' => $faker->realText(255),
                'user_id' => $faker->numberBetween(1, 10),
                'comment_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
