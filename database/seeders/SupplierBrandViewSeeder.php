<?php

namespace Database\Seeders;

use App\Models\SupplierBrandView;
use Illuminate\Database\Seeder;

class SupplierBrandViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierBrandView::factory()->count(rand(100, 500))->create();
    }
}
