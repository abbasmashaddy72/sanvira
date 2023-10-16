<?php

namespace Database\Seeders;

use App\Models\VendorView;
use Illuminate\Database\Seeder;

class VendorViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VendorView::factory()->count(rand(100, 500))->create();
    }
}
