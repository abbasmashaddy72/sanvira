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
        Schema::create('supplier_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('account_type', ['Trail', 'Regular', 'Featured']);
            $table->enum('transaction_type', ['Paid', 'Unpaid', 'Pending']);
            $table->string('amount');
            $table->date('start_date');
            $table->bigInteger('end_days');
            $table->string('image');
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
        Schema::dropIfExists('supplier_transactions');
    }
};
