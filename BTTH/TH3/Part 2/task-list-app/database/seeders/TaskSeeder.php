<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); 
 
        foreach (range(1, 10) as $index) { 
            Task::create([ 
                'title' => $faker->sentence(), 
                'description' => $faker->paragraph(), 
                'long_description' => $faker->optional()
                                            ->text(), 
                'completed' => $faker->boolean(), 
            ]); 
        } 
    }
}
