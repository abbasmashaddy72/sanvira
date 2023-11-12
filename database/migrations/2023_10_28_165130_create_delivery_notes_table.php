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
        Schema::create('delivery_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('buyer_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('delivery_note_no')->unique();
            $table->timestamp('order_submission_date_time')->nullable();
            $table->string('delivery_notes_attachment')->nullable();
            $table->enum('status', ['Open', 'Close']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_notes');
    }
};
