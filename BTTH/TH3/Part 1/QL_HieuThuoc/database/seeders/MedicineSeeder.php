<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<30; $i++){
            DB::table('medicines')->insert([
                'name' => $faker->word,
                'brand' => $faker->company,
                'dosage' => $faker->numberBetween(10, 100),
                'form' => $faker->word,
                'price' => $faker->randomFloat(2, 1, 1000),
                'stock' => $faker->numberBetween(100, 200)
            ]);
        }
    }
}
