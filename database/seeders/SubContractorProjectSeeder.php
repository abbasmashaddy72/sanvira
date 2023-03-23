<?php

namespace Database\Seeders;

use App\Models\SubContractorProject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubContractorProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubContractorProject::factory()->count(rand(50, 100))->create();
    }
}
