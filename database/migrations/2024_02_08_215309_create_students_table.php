<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('user_type')->default('student');
            $table->string('sex');
            $table->string('email');
            $table->string('address');
            $table->string('grade');
            $table->string('password');
            $table->unsignedBigInteger('student_class_id')->nullable();
            $table->foreign('student_class_id')->references('id')->on('classes')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
