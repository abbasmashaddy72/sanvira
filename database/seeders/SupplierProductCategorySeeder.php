<?php

namespace Database\Seeders;

use App\Models\SupplierProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierProductCategory::factory()->count(rand(100, 500))->create();
    }
}
