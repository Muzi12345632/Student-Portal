<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Classes::factory()
        ->count(10)
        ->create();
        //Classes::truncate();

        /*Classes::insert([
            [
                'name' => 'Mathematics',
            ],
            [
                'name' => 'English',
            ],
            [
                'name' => 'Physics',
            ],
            [
                'name' => 'Chemistry',
            ],
            [
                'name' => 'Computer Science',
            ],
        ])*/;
    }
}
