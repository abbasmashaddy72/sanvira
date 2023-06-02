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
        Schema::table('supplier_products', function (Blueprint $table) {
            $table->foreignId('brand_id')->after('supplier_product_category_id')->constrained('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('manufacturer_id')->after('brand_id')->constrained('manufacturers')->onUpdate('cascade')->onDelete('cascade');
            $table->dropColumn('manufacturer');
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
        Schema::table('patients', function (Blueprint $table) {
            $table->dropForeign('brand_id');
            $table->dropColumn('brand_id');
            $table->dropForeign('manufacturer_id');
            $table->dropColumn('manufacturer_id');
            $table->string('manufacturer')->after('avb_stock')->nullable();
            $table->string('brand')->after('manufacturer')->nullable();
        });
    }
};
