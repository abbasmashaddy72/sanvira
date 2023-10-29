<?php

namespace Database\Seeders;

use App\Models\Enquiry;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enquiry::factory()->count(rand(50, 200))->create();
    }
}
