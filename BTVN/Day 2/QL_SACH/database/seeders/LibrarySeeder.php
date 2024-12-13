<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LibrarySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i<10; $i++) {
            DB::table('libraries')->insert([
                'name' => $faker->company,
                'address' => $faker->address,
                'contact_number' => $faker->numerify('###-###-####'),
            ]);
        }
    }
}
