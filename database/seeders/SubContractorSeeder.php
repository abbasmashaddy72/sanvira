<?php

namespace Database\Seeders;

use App\Models\SubContractor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubContractor::factory()->count(rand(10, 300))->create();
    }
}
