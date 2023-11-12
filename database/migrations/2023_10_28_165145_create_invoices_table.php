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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('delivery_note_id')->constrained('delivery_notes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('buyer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('invoice_no')->unique();
            $table->timestamp('delivery_note_submission_date_time')->nullable();
            $table->enum('status', ['Open', 'Approved', 'Resubmit'])->default('Open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
