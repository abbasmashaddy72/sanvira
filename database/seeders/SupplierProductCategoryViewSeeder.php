<?php

namespace Database\Seeders;

use App\Models\SupplierProductCategoryView;
use Illuminate\Database\Seeder;

class SupplierProductCategoryViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierProductCategoryView::factory()->count(rand(100, 500))->create();
    }
}
