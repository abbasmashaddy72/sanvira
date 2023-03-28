<?php

namespace Database\Seeders;

use App\Models\SupplierTermCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierTermConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierTermCondition::factory()->count(rand(100, 300))->create();
    }
}
