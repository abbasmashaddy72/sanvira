<?php

namespace Database\Seeders;

use App\Models\SupplierView;
use Illuminate\Database\Seeder;

class SupplierViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierView::factory()->count(rand(100, 500))->create();
    }
}
