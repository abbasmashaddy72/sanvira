<?php

namespace Database\Seeders;

use App\Models\DeliveryNote;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeliveryNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryNote::factory()->count(rand(50, 200))->create();
    }
}
