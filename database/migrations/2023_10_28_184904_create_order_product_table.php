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
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->string('size')->nullable();
            $table->decimal('diameter', 10, 2)->nullable();
            $table->string('measurement_units')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->string('weight_units')->nullable();
            $table->string('quantity_type');
            $table->longText('color')->nullable();
            $table->string('item_type')->nullable();
            $table->string('quantity')->nullable();
            $table->decimal('our_price', 10, 2)->nullable();
            $table->decimal('client_price', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
