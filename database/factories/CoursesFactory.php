<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Courses>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

         // Check if there are any classes available in the database
        $classesCount = Classes::count();

        // If there are no classes available, return a default value or handle the scenario accordingly
        if ($classesCount === 0) {
            // Handle the scenario where there are no classes available
            // You can return default values or handle it based on your application logic
            return [];
        }


        return [
            //
            'name'=>$this->faker->unique()->sentence($nbWords=2, $variableWords=true),
            'course_code'=>$this->faker->numberBetween(200,900),
            'description'=>$this->faker->sentence($nbWords=10, $variableWords=true),
            /*'classes_id'=> \App\Models\Classes::all()->random()->id,
            'teacher_id'=> \App\Models\Teacher::all()->random()->id,*/
            /*'student_id'=> \App\Models\Student::all()->random()->id,*/
        ];
    }
}
