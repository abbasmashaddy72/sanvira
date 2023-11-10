<?php

namespace Database\Seeders;

use App\Models\Quotation;
use Illuminate\Database\Seeder;

class QuotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quotation::factory()->count(rand(50, 200))->create();
    }
}
