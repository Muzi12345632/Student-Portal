<?php

namespace Database\Factories;
use App\Models\Classes;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //protected $model = Teacher::class;

    public function definition(): array
    {

        $name = $this->faker->name();

        return [
            //
            'user_id'=> \App\Models\User::all()->random()->id,
            'biography' => $this->faker->sentence($nbWords=100, $variableWords=true),
            /*'class_id'=> \App\Models\Classes::all()->random()->id,*/
            
        ];
    }
}
