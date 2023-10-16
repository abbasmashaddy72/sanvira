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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('brand_id')->after('category_id')->constrained('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('vendor_id')->after('brand_id')->constrained('vendors')->onUpdate('cascade')->onDelete('cascade');
            $table->dropColumn('vendor');
            $table->dropColumn('brand');
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
            $table->dropForeign('brand_id');
            $table->dropColumn('brand_id');
            $table->dropForeign('vendor_id');
            $table->dropColumn('vendor_id');
            $table->string('vendor')->after('avb_stock')->nullable();
            $table->string('brand')->after('vendor')->nullable();
        });
    }
};
