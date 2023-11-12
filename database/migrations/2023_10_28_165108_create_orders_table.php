<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->constrained('quotations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('buyer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('order_no')->unique();
            $table->timestamp('quotation_submission_date_time')->nullable();
            $table->string('purchase_order_pdf')->nullable();
            $table->enum('status', ['Open', 'Close'])->default('Open');
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
        Schema::dropIfExists('orders');
    }
};
