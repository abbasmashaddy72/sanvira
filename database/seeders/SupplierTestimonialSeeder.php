<?php

namespace Database\Seeders;

use App\Models\SupplierTestimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierTestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierTestimonial::factory()->count(rand(10, 300))->create();
    }
}
