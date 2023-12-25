<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

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
            $this->call(StaticOptionSeeder::class);
            $this->call(CategorySeeder::class);
            // Import JSON data into the Country model
            Artisan::call('model:import', [
                'model' => 'Country',
                'path' => 'public/countries.json',
                '--only-fields' => 'id,region,name,phone_code,capital,currency,currency_symbol'
            ], $this->command->getOutput());

            // Import JSON data into the State model
            Artisan::call('model:import', [
                'model' => 'State',
                'path' => 'public/states.json',
                '--only-fields' => 'id,country_id,name,state_code'
            ], $this->command->getOutput());

            // Import JSON data into the City model
            Artisan::call('model:import', [
                'model' => 'City',
                'path' => 'public/cities.json',
                '--only-fields' => 'id,country_id,state_id,name,state_code'
            ], $this->command->getOutput());
            $this->call(UserSeeder::class);
        } else {
            $this->call(PermissionSeeder::class);
            $this->call(RoleSeeder::class);
            $this->call(StaticOptionSeeder::class);
            // Import JSON data into the Country model
            Artisan::call('model:import', [
                'model' => 'Country',
                'path' => 'public/countries.json',
                '--only-fields' => 'id,region,name,phone_code,capital,currency,currency_symbol'
            ], $this->command->getOutput());

            // Import JSON data into the State model
            Artisan::call('model:import', [
                'model' => 'State',
                'path' => 'public/states.json',
                '--only-fields' => 'id,country_id,name,state_code'
            ], $this->command->getOutput());

            // Import JSON data into the City model
            Artisan::call('model:import', [
                'model' => 'City',
                'path' => 'public/cities.json',
                '--only-fields' => 'id,country_id,state_id,name,state_code'
            ], $this->command->getOutput());
            $this->call(UserSeeder::class);
            $this->call(BlogSeeder::class);
            $this->call(FaqSeeder::class);
            $this->call(CategorySeeder::class);
            $this->call(ProductSeeder::class);
            $this->call(ProductAttributesSeeder::class);
            $this->call(SliderSeeder::class);
            $this->call(ProductViewSeeder::class);
            $this->call(ProductReviewSeeder::class);
            $this->call(CategoryViewSeeder::class);
            $this->call(TestimonialSeeder::class);
            $this->call(RfqSeeder::class);
        }
    }
}
