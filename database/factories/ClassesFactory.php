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
            'name'=>$this->faker->unique()->sentence($nbWords=1, $variableWords=true),
            /*'teacher_id'=> function() { return factory(Teacher::class)->create()->id;},*/
            /*'teacher_id'=> \App\Models\Teacher::all()->random()->id,
*/        ];
    }
}
