<?php

namespace Database\Factories;
use App\Models\Classes;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Student;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //protected $model = Student::class;


    public function definition(): array
    {
        /*$sex = $this->faker->randomElement(['M','F']);
        $name = $this->faker->name();*/

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
            'user_id' => \App\Models\User::all()->random()->id,
            'classes_id'=> \App\Models\Classes::all()->random()->id,
            /*'role_id'=> \App\Models\Role::all()->random()->id, */
            /*'course_id'=> \App\Models\Courses::all()->random()->{id},*/
        ];
    }
}
