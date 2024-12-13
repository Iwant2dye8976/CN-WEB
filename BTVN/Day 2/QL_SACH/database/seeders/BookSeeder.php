<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create(); 

        for ($i=0; $i<10; $i++) { 
            DB::table('books')->insert([
                'title' => $faker->sentence(3), 
                'author' => $faker->name,
                'publication_year' => $faker->year, 
                'genre' => $faker->word, 
                'library_id' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
