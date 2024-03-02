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
        /*Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('class_name');
            $table->text('description');
            /*$table->unsignedBigInteger('cousre_id')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');*/
            //$table->timestamps();
        //});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('classes');
    }
};
