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
            $table->foreignId('user_id')->constrained();
            $table->decimal('total_amount', 12, 2);
            $table->enum('status', ['pending', 'delivered', 'shipped', 'processing', 'cancelled']);
            $table->string('transaction_image', 255)->nullable();
            $table->enum('payment_status', ['paid', 'unpaid']);
            $table->enum('payment_method', ['cod', 'online']);
            $table->timestamps();
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
