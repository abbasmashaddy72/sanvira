<?php

namespace Database\Seeders;

use App\Models\SupplierCertificate;
use Illuminate\Database\Seeder;

class SupplierCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SupplierCertificate::factory()->count(rand(50, 100))->create();
    }
}
