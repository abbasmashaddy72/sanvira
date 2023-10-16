<?php

namespace Database\Seeders;

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
        if (config('app.env') == 'production') {
            $this->call(PermissionSeeder::class);
            $this->call(RoleSeeder::class);
            $this->call(UserSeeder::class);
            $this->call(StaticOptionSeeder::class);
            $this->call(CategorySeeder::class);
            $this->call(CountrySeeder::class);
        } else {
            $this->call(PermissionSeeder::class);
            $this->call(RoleSeeder::class);
            $this->call(UserSeeder::class);
            $this->call(StaticOptionSeeder::class);
            $this->call(BrandSeeder::class);
            $this->call(VendorSeeder::class);
            $this->call(CountrySeeder::class);
            $this->call(CategorySeeder::class);
            $this->call(ProductSeeder::class);
            $this->call(ProductAttributesSeeder::class);
            $this->call(SliderSeeder::class);
            $this->call(ProductViewSeeder::class);
            $this->call(CategoryViewSeeder::class);
            $this->call(BrandViewSeeder::class);
            $this->call(VendorViewSeeder::class);
        }
    }
}
