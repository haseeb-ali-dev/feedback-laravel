<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $category_ids = [1, 2, 3, 4, 5];
        $user_ids = [1, 2, 3, 4];

        for ($i = 0; $i < 100; $i++)
        {
            $title = $faker->sentence(mt_rand(4, 10));
            $description = $faker->text(mt_rand(10, 50));

            Feedback::insert([
                'title'       => $title,
                'description' => $description,
                'category_id' => $category_ids[array_rand($category_ids)],
                'user_id'     => $user_ids[array_rand($user_ids)],
                'created_at'  => now(),
                'updated_at'  => now(),

            ]);
        }


    }
}
