<?php

namespace Database\Seeders;

use App\Models\SupplierTeam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierTeam::factory()->count(rand(10, 300))->create();
    }
}
