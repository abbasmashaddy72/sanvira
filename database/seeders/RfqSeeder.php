<?php

namespace Database\Seeders;

use App\Models\Rfq;
use Illuminate\Database\Seeder;

class RfqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rfq::factory()->count(rand(20, 50))->create();
    }
}
