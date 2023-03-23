<?php

namespace Database\Seeders;

use App\Models\SupplierProductAttributes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierProductAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierProductAttributes::factory()->count(rand(100, 500))->create();
    }
}
