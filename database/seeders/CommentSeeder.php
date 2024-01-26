<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $user_ids = [1, 2, 3, 4];

        for ($i = 0; $i < 5000; $i++)
        {
            $content = $faker->text(mt_rand(80, 120));

            Comment::insert([
                'content'     => $content,
                'feedback_id' => mt_rand(1, 100),
                'user_id'     => $user_ids[array_rand($user_ids)],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
