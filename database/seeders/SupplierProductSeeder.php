<?php

namespace Database\Seeders;

use App\Models\SupplierProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        SupplierProduct::factory()->count(rand(10, 300))->create();
    }
}
