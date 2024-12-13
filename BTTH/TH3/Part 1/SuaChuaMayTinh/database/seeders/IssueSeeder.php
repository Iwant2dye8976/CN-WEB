<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<30;$i++){
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 30),
                'reported_by' => $faker->name,
                'reported_date' => $faker->date,
                'description' => $faker->sentence(10, true),
                'urgency' => $faker->randomElement(['Low','Medium','High']),
                'status' => $faker->randomElement(['Open','In Progress','Resolved']),
            ]);
        }
    }
}
