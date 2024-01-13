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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained('course_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug');
            $table->boolean('certificate');
            $table->string('thumbnail')->nullable();
            $table->string('poster')->nullable();
            $table->string('url_kursus')->nullable();
            $table->enum('type', ['free', 'premium']);
            $table->enum('jenis', ['live', 'online', 'bootcamp', 'e-book']);
            $table->enum('status', ['draft', 'published'])->default('draft'); // Default status adalah 'draft'
            $table->integer('price')->default(0)->nullable();
            $table->enum('level', ['all-level', 'beginner', 'intermediate', 'advance']);
            $table->longText('description')->nullable();
            $table->boolean('is_range')->default(false);
            $table->dateTime('start_course')->nullable();
            $table->dateTime('end_course')->nullable();
            $table->date('early_bird')->nullable();
            $table->integer('early_bird_price')->nullable();
            // $table->string('url_course')->nullable();
            $table->integer('duration');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
