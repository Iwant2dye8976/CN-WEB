<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ComputerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<30;$i++){
            DB::table('computers')->insert([
                'computer_name' => $faker->name,
                'model' => $faker->company,
                'operating_system' => $faker->lastName,
                'processor' => $faker->firstName,
                'memory' => $faker->numberBetween(2,64),
                'available' => $faker->boolean,
            ]);
        }
    }
}
