<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Student;

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
        $sex = $this->faker->randomElement(['M','F']);
        $name = $this->faker->name();

        return [
            //
            'name'=>$name,
            'sex'=>$sex,
            'email'=>$this->faker->email(),
            'address'=>$this->faker->streetAddress(),
            'age'=>$this->faker->numberBetween(1,60),
            'student_class_id'=>\App\Models\Classes::all()->random()->id,
            'password'=>$this->faker->password(),            
            'user_type'=>$this->faker->randomElement(['student']),
            'grade'=>$this->faker->randomElement(['1','2','3','4','5','6','7'])

        ];
    }
}
