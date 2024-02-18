<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            //
            'name'=>$this->faker->unique()->sentence($nbWords=2, $variableWords=true),
            'course_code'=>$this->faker->numberBetween(200,900),
            'class_id'=> \App\Models\Classes::all()->random()->id,
        ];
    }
}
