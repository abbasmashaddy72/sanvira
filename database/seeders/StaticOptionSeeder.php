<?php

namespace Database\Seeders;

use App\Models\StaticOption;
use Illuminate\Database\Seeder;

class StaticOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            ['logo', 'frontend/0cd1cz8ENL2chXz8LmHgnlK5NxgZkA2Q9hdgayjL.jpg'],
            ['footer_logo', 'frontend/xjw6jrJoRgP33MLDtmv0N1Esyn2IyXx0L2ngm7wO.webp'],
            ['short_description', "Stop wasting time sourcing, onboarding & managing suppliers. Tap into your market's best suppliers on the Kasper network"],
            ['privacy_policy', ''],
            ['terms_conditions', ''],
            ['twitter', ''],
            ['facebook', ''],
            ['instagram', ''],
            ['linkedin', ''],
            ['youtube', ''],
            ['google_business', ''],
            ['embed_map_link', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14451.288805047448!2d55.1651604!3d25.1078793!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6b1495a55be1%3A0x5b8e89f8023b5766!2sin5%20Tech!5e0!3m2!1sen!2sin!4v1684761060289!5m2!1sen!2sin'],
            ['google_business', ''],
        ];

        foreach ($inputs as $data) {
            StaticOption::create([
                'name' => $data[0],
                'value' => $data[1],
            ]);
        }
    }
}
