<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<30;$i++){
            DB::table('classes')->insert([
                'grade_level' => $faker->randomElement(['Pre-K','Kindergerten']),
                'room_number' => $faker->regexify('VH[0-9]{1}'),
            ]);
        }
    }
}
