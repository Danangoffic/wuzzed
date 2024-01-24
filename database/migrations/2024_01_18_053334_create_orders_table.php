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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_unique');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');
            $table->bigInteger('total_amount');
            $table->enum('status', ['pending', 'paid', 'failed', 'canceled', 'refunded'])->default('pending');
            $table->unsignedBigInteger('promo_code_id')->nullable();
            $table->timestamps();

            $table->unique(['user_id', 'course_id', 'order_unique']);
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('promo_code_id')->references('id')->on('promo_codes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
