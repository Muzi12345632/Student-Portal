<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Courses;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        

        \App\Models\Role::factory(1)->create(['name' => 'admin']);
        \App\Models\Role::factory(1)->create(['name' => 'student']);
        \App\Models\Role::factory(1)->create(['name' => 'teacher']);


        \App\Models\User::factory(1)->create([
            'name'=> 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => Role::ADMIN
        ]);
        /*->each(function (\App\Models\User $u) {
            \App\Models\Student::factory(1)->create(['user_id' => $u->id]);
        });*/



        \App\Models\User::factory(200)->create()
            ->each(function(\App\Models\User $u){
               \App\Models\Student::factory(1)->create(['user_id' => $u ->id]); 
            });
        

        \App\Models\User::factory(10)->create()
            ->each(function (\App\Models\User $u) {
                \App\Models\Teacher::factory(1)->create(['user_id' => $u->id]);
            });



        \App\Models\Classes::factory(10)->create()
        ->each(function(\App\Models\Classes $c) {
            $c->courses()->saveMany(\App\Models\Courses::factory(7)->create());
        });

    }
}
