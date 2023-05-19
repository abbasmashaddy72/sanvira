<?php

namespace Database\Seeders;

use App\Models\SupplierProject;
use Illuminate\Database\Seeder;

class SupplierProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierProject::factory()->count(rand(100, 500))->create();
    }
}
