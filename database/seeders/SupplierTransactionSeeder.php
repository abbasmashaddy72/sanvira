<?php

namespace Database\Seeders;

use App\Models\SupplierTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierTransaction::factory()->count(rand(100, 250))->create();
    }
}
