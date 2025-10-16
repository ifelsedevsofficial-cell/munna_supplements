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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            // $table->foreignId('category_id')->constrained();
            $table->foreignId('sub_category_id')->constrained();
            $table->text('description');
            $table->decimal('original_price', 12, 2);
            $table->decimal('discounted_price', 12, 2);
            $table->decimal('stock', 12, 2);
            $table->string('image', 255);
            $table->json('images')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
