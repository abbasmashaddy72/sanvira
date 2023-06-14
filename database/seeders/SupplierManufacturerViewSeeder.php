<?php

namespace Database\Seeders;

use App\Models\SupplierManufacturerView;
use Illuminate\Database\Seeder;

class SupplierManufacturerViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierManufacturerView::factory()->count(rand(100, 500))->create();
    }
}
