<?php

namespace Database\Seeders;

use App\Models\SubContractorService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubContractorServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubContractorService::factory()->count(rand(10, 300))->create();
    }
}
