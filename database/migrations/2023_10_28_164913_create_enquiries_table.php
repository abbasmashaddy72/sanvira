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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rfq_id')->constrained('rfqs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->time('submission_time');
            $table->enum('status', ['Open', 'Close'])->default('Open');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
