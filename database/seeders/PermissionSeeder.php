<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            ['Role List'],
            ['Role Add'],
            ['Role Edit'],
            ['Role View'],
            ['Role Delete'],
            ['User List'],
            ['User Add'],
            ['User Edit'],
            ['User View'],
            ['User Delete'],
            ['Brand List'],
            ['Brand Add'],
            ['Brand Edit'],
            ['Brand View'],
            ['Brand Delete'],
            ['Vendor List'],
            ['Vendor Add'],
            ['Vendor Edit'],
            ['Vendor View'],
            ['Vendor Delete'],
            ['Category List'],
            ['Category Add'],
            ['Category Edit'],
            ['Category View'],
            ['Category Delete'],
            ['Product List'],
            ['Product Add'],
            ['Product Edit'],
            ['Product View'],
            ['Product Delete'],
            ['Testimonial List'],
            ['Testimonial Add'],
            ['Testimonial Edit'],
            ['Testimonial View'],
            ['Testimonial Delete'],
            ['Order List'],
            ['Order Add'],
            ['Order Edit'],
            ['Order View'],
            ['Order Delete'],
            ['Product Review List'],
            ['Product Review Add'],
            ['Product Review Edit'],
            ['Product Review View'],
            ['Product Review Delete'],
            ['Address List'],
            ['Address Add'],
            ['Address Edit'],
            ['Address View'],
            ['Address Delete'],
            ['Homepage'],
            ['Slider List'],
            ['Slider Add'],
            ['Slider Delete'],
            ['Privacy Policy'],
            ['Terms of Use'],
            ['Return Refunds'],
            ['User Impersonate'],
            ['Dashboard'],
            ['Contact Us'],
        ];

        foreach ($inputs as $data) {
            Permission::insert([
                'name' => $data[0],
                'slug' => strtolower(str_replace(' ', '_', $data[0])),
            ]);
        }
    }
}
