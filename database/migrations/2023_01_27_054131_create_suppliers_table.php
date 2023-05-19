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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('company_name');
            $table->string('company_email')->nullable();
            $table->longText('company_address');
            $table->bigInteger('company_number')->nullable();
            $table->string('company_locality');
            $table->string('tagline')->nullable();
            $table->longText('logo')->nullable();
            $table->date('doe');
            $table->string('license');
            $table->string('type');
            $table->string('website_url')->nullable();
            $table->longText('description')->nullable();
            $table->longText('terms_conditions')->nullable();
            $table->boolean('agree')->default(0);
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
        Schema::dropIfExists('suppliers');
    }
};
