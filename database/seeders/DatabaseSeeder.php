<?php

//namespace Database\Seeders;

use App\Models\User;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Courses;
use App\Models\Role;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        Role::factory( 1)->create(['name' => 'admin']);
        Role::factory( 1)->create(['name' => 'student']);
        Role::factory( 1)->create(['name' => 'teacher']);
        

        Classes::factory(10)->create()
        ->each(function( $c){
            Courses::factory(1)->create(['name'=> 'Mathematics']);
            Courses::factory(1)->create(['name'=> 'English']);
            Courses::factory(1)->create(['name'=> 'Ndebele']);
            Courses::factory(1)->create(['name'=> 'General Science']);
            Courses::factory(1)->create(['name'=> 'Biology']);
        });

        User::factory(1)->create([
            'name'=> 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => Role::ADMIN
        ])
        ->each(function (User $user) {
            //Teacher::factory()->create(['user_id' => $user->id]);
            //$user->teacher->factory()->count(1)->create(['user_id'=>$user->id]);
        });
        
        \App\Models\User::factory(200)->create(['role_id' => Role::STUDENT])->each(function ($user) {
            if ($user->role_id === Role::where('name', 'student')->first()->id) {
                $student = Student::factory(1)
                    ->has(Classes::factory(), 'class')
                    ->has(Courses::factory()->count(6))
                    ->create(['user_id' => $user->id]);
            }      
        });

        //$teacher = Teacher::factory()->count(1)->create();

        // Create teacher users
        //User::factory(10)->has(Teacher::factory(), 'teacher')->create(['role_id' => Role::TEACHER]);



        $user1 = User::factory(20)->create([
            
            'role_id' => Role::TEACHER
        ])
        ->each(function (User $user) {
            //Teacher::factory()->create(['user_id' => $user->id]);
            //$user->teacher->factory()->count(1)->create(['user_id'=>$user->id]);
        });


        DB::table('teachers')->insert([
            [
                'user_id'  => 202,
                'biography' => 'first teacher to be recorded in system',
                'course_id' => 2,
            ]
        ]);


        DB::table('classes_teachers')->insert([
            [
                //'user_id'  => 1,
                'classes_id' => 7,
                'teacher_id' => 1,
            ]
        ]);



    }
}
