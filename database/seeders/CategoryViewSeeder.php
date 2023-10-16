<?php

namespace Database\Seeders;

use App\Models\CategoryView;
use Illuminate\Database\Seeder;

class CategoryViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryView::factory()->count(rand(100, 500))->create();
    }
}
