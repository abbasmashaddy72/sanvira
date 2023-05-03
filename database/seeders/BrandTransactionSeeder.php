<?php

namespace Database\Seeders;

use App\Models\BrandTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BrandTransaction::factory()->count(rand(100, 500))->create();
    }
}
