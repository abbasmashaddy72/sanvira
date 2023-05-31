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
        Schema::create('brand_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('account_type', ['Trial', 'Regular', 'Featured'])->default('Trial');
            $table->enum('transaction_type', ['Paid', 'Unpaid', 'Pending'])->default('Unpaid');
            $table->string('amount')->default(0);
            $table->date('start_date');
            $table->bigInteger('end_days')->default(30);
            $table->string('image')->nullable();
            $table->enum('status', ['Active', 'InActive', 'Expired']);
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
        Schema::dropIfExists('brand_transactions');
    }
};
