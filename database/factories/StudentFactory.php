<?php

namespace Database\Factories;

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

        return [
            //
            'user_id' => User::all()->random()->id,
            /*'class_id'=>\App\Models\Classes::all()->random()->id,*/
        ];
    }
}
