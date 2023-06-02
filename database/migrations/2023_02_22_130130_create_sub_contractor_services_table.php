<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_contractor_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_contractor_id')->constrained('sub_contractors')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('image');
            $table->unsignedInteger('parent_id')->default(0)->nullable();
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
        Schema::dropIfExists('sub_contractor_services');
    }
};
