<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TableCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($x=1; $x<=20; $x++)
        {
            DB::table('comments')->insert([
                'user_id' => $faker->numberBetween(1, 10),
                'article_id' => $faker->numberBetween(1, 20),
                'comment' => $faker->paragraph(3),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
