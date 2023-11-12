<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('country_id')->constrained('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vendor_id')->constrained('vendors')->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('avb_stock', 10, 2);
            $table->string('sku');
            $table->string('barcode');
            $table->decimal('length', 10, 2)->nullable();
            $table->decimal('breadth', 10, 2)->nullable();
            $table->decimal('width', 10, 2)->nullable();
            $table->decimal('diameter', 10, 2)->nullable();
            $table->string('measurement_units')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->string('weight_units')->nullable();
            $table->string('quantity_type');
            $table->longText('color')->nullable();
            $table->string('item_type')->nullable();
            $table->decimal('max_discount', 10, 2);
            $table->enum('max_discount_unit', ['Regular', 'Percentage']);
            $table->decimal('tax_percentage', 10, 2);
            $table->decimal('min_price', 10, 2);
            $table->decimal('max_price', 10, 2);
            $table->bigInteger('min_order_quantity');
            $table->bigInteger('max_order_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_variations');
    }
};
