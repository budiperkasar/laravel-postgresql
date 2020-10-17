<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TableArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($x=1; $x<=20; $x++)
        {
            DB::table('articles')->insert([
                'created_by' => $faker->numberBetween(1, 20),
                'status' => $faker->numberBetween(0, 1),
                'priority' => $faker->numberBetween(1, 20),
                'title' => $faker->sentence(5),
                'slug' => $faker->slug,
                'content' => $faker->text(100),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
