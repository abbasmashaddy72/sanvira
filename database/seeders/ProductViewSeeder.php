<?php

namespace Database\Seeders;

use App\Models\ProductView;
use Illuminate\Database\Seeder;

class ProductViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductView::factory()->count(rand(100, 500))->create();
    }
}
