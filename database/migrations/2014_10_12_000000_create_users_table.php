<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        //create roles table
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('role name');
            $table->text('description');
            $table->timestamps();
        });


        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->string('name');
            $table->string('age');
            $table->string('sex');
            $table->string('address');
            /*$table->string('contact_phone');*/
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        /*Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_name');
            $table->text('description');
            $table->timestamps();
        });*/

        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->text('description');
            /*$table->unsignedBigInteger('cousre_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');*/
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
