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
            'name'=>$name,
            'email'=>$this->faker->email(),
            'contact_phone'=>$this->faker->phoneNumber(),
            'class_id'=> \App\Models\Classes::all()->random()->id,
            'user_type'=>$this->faker->randomElement(['teacher']),
        ];
    }
}
