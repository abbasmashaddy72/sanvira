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
        Schema::create('supplier_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('supplier_product_category_id')->constrained('supplier_product_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->longText('description');
            $table->string('min_max_oq');
            $table->string('edt');
            $table->string('avb_stock');
            $table->string('manufacturer');
            $table->string('brand');
            $table->string('model');
            $table->string('item_type');
            $table->string('sku');
            $table->boolean('on_sale')->default(0);
            $table->string('image');
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
        Schema::dropIfExists('supplier_products');
    }
};
