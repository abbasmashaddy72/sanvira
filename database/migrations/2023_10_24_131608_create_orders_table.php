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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rfq_id')->constrained('rfqs')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status', ['Pending', 'Processing', 'Quotation Sent', 'Quotation Received', 'Order Placed', 'Delivered Note Received', 'Due', 'Paid'])->default('Pending');
            $table->timestamp('rfq_submission_date')->nullable();
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
