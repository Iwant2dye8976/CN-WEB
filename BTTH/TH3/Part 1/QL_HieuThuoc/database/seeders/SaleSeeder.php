<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0; $i<30; $i++){
            DB::table('sales')->insert([
                'medicine_id' => $faker->numberBetween(1,30),
                'quantity' => $faker->numberBetween(100, 1000),
                'sale_date' => $faker->dateTime('now'),
                'customer_phone' => str_replace(' ', '', $faker->numerify('### ### ####'))
            ]);
        }
    }
}
