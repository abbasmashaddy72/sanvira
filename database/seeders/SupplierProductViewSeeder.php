<?php

namespace Database\Seeders;

use App\Models\SupplierProductView;
use Illuminate\Database\Seeder;

class SupplierProductViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierProductView::factory()->count(rand(100, 500))->create();
    }
}
