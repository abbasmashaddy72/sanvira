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
            $table->string('company_email');
            $table->longText('company_address');
            $table->integer('company_number');
            $table->string('company_locality');
            $table->string('tagline');
            $table->longText('logo');
            $table->string('yoe');
            $table->string('website_url');
            $table->longText('description');
            $table->longText('terms_conditions');
            $table->string('contact_person_name');
            $table->string('contact_person_email');
            $table->string('contact_person_number');
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
