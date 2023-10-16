<?php

namespace Database\Seeders;

use App\Models\BrandView;
use Illuminate\Database\Seeder;

class BrandViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BrandView::factory()->count(rand(100, 500))->create();
    }
}
