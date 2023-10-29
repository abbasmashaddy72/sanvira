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
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->after('name');
            $table->renameColumn('name', 'title');
            $table->string('barcode')->after('sku');
            $table->bigInteger('length')->after('item_type');
            $table->bigInteger('breadth')->after('length');
            $table->bigInteger('width')->after('breadth');
            $table->enum('measurement_unit', ['m', 'cm', 'mm', 'in', 'ft'])->after('width');
            $table->bigInteger('weight')->after('measurement_unit');
            $table->enum('weight_unit', ['kg', 'g', 't', 'oz'])->after('weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->renameColumn('title', 'name');
            $table->dropColumn('barcode');
            $table->dropColumn('own_sku');
            $table->dropColumn('length');
            $table->dropColumn('length_units');
            $table->dropColumn('breadth');
            $table->dropColumn('breadth_units');
            $table->dropColumn('width');
            $table->dropColumn('width_units');
            $table->dropColumn('weight');
            $table->dropColumn('weight_unit');
        });
    }
};
