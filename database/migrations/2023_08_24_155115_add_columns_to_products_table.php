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
            $table->string('own_sku')->after('barcode');
            $table->bigInteger('length')->after('item_type');
            $table->enum('length_units', ['m', 'cm', 'mm', 'in', 'ft'])->after('length');
            $table->bigInteger('breadth')->after('length_units');
            $table->enum('breadth_units', ['m', 'cm', 'mm', 'in', 'ft'])->after('breadth');
            $table->bigInteger('width')->after('breadth_units');
            $table->enum('width_units', ['m', 'cm', 'mm', 'in', 'ft'])->after('width');
            $table->bigInteger('weight')->after('width_units');
            $table->enum('weight_units', ['kg', 'g', 't', 'oz'])->after('width');
            $table->boolean('verification')->default(0)->after('data_sheets');
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
            $table->dropColumn('weight_units');
        });
    }
};
