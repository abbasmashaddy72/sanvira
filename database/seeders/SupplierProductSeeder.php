<?php

namespace Database\Seeders;

use App\Models\SupplierProduct;
use Illuminate\Database\Seeder;

class SupplierProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierProduct::factory()->count(rand(100, 300))->create();
    }
}
