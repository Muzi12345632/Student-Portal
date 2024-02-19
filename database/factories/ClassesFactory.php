<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //protected $model = Classes::class;

    public function definition(): array
    {
        return [
            //
            'class_name'=>$this->faker->unique()->sentence($nbWords=1, $variableWords=true),
            'description' => $this->faker->sentence($nbWords=10, $variableWords=true),
            /*'course_id' => \App\Models\Courses::all()->random()->id,*/
            
        ];
    }
}
