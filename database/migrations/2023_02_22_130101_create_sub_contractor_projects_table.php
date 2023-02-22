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
        Schema::create('sub_contractor_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_contractor_id')->constrained('sub_contractors')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->longText('description');
            $table->string('year_range');
            $table->longText('images');
            $table->longText('feedback');
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
        Schema::dropIfExists('sub_contractor_projects');
    }
};
