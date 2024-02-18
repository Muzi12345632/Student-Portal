<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Classes;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*\App\Models\User::factory(10)->create();*/

        /*\App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             
        ]);*/

        //Classes::factory(5)->create();


        $this->call([ClassesSeeder::class,  TeacherSeeder::class, StudentSeeder::class, CoursesSeeder::class]);
    }
}
