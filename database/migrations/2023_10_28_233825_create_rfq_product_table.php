<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rfq_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rfq_id')->constrained('rfqs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->string('diameter')->nullable();
            $table->string('quantity_type');
            $table->string('color')->nullable();
            $table->string('item_type')->nullable();
            $table->string('quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rfq_product');
    }
};
