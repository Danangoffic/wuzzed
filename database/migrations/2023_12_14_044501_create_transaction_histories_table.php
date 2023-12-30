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
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->foreignId("user_id");
            $table->foreignId("course_id");
            $table->enum('status_payment', ['paid', 'pending', 'canceled'])->default('pending');
            $table->string('promo_code')->nullbable();
            $table->integer('payment_amount');
            $table->integer('payment_promo_amount')->default(0)->nullable();
            $table->integer('total_payment');
            $table->string('done_by');
            $table->timestamps();
            $table->unique(['order_id', 'user_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_histories');
    }
};
