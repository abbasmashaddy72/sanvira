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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enquiry_id')->constrained('enquiries')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('buyer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('quotation_no')->unique();
            $table->dateTime('enquiry_submission_date_time');
            $table->enum('status', ['Open', 'Revise', 'Revised', 'Approved', 'Rejected'])->default('Open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotations');
    }
};
