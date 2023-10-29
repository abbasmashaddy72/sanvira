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
        Schema::create('delivery_note_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_note_id')->constrained('delivery_notes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_note_product');
    }
};
