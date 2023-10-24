<?php

namespace Database\Seeders;

use App\Models\BillingAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillingAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BillingAddress::factory()->count(rand(100, 500))->create();
    }
}
