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
        Schema::table('users', function (Blueprint $table) {
            $table->string('image')->after('email')->nullable();
            $table->boolean('subscription')->after('email')->nullable();
            $table->bigInteger('zip_code')->after('email')->nullable();
            $table->foreignId('city_id')->after('email')->nullable()->constrained('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->string('landmark')->after('email')->nullable();
            $table->string('street_no')->after('email')->nullable();
            $table->string('mobile')->after('email')->nullable();
            $table->enum('status', ['Active', 'InActive'])->after('last_password_change');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('mobile');
            $table->dropColumn('street_no');
            $table->dropColumn('locality');
            $table->dropColumn('landmark');
            $table->dropForeign('city_id');
            $table->dropColumn('city_id');
            $table->dropColumn('zip_code');
            $table->dropColumn('subscription');
            $table->dropColumn('image');
            //
        });
    }
};
