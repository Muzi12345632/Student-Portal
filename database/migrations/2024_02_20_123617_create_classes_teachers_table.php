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
        Schema::create('classes_teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classes_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            
            $table->foreign('classes_id')->references('id')->on('classes')->onDelete('set null');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_teachers');
    }
};
