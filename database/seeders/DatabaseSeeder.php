<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ContractorSeeder::class);
        $this->call(SubContractorSeeder::class);
        $this->call(SubContractorProjectSeeder::class);
        $this->call(SubContractorServiceSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(SupplierTeamSeeder::class);
        $this->call(SupplierCertificateSeeder::class);
        $this->call(SupplierProductCategorySeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ManufacturerSeeder::class);
        $this->call(SupplierProductSeeder::class);
        $this->call(SupplierProductAttributesSeeder::class);
        $this->call(SupplierProjectSeeder::class);
        $this->call(SupplierTestimonialSeeder::class);
    }
}
