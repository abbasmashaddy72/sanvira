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
            ['Brand Transaction List'],
            ['Brand Transaction Add'],
            ['Brand Transaction Edit'],
            ['Brand Transaction View'],
            ['Brand Transaction Delete'],
            ['Manufacturer List'],
            ['Manufacturer Add'],
            ['Manufacturer Edit'],
            ['Manufacturer View'],
            ['Manufacturer Delete'],
            ['Supplier List'],
            ['Supplier Add'],
            ['Supplier Edit'],
            ['Supplier View'],
            ['Supplier Delete'],
            ['Supplier Category List'],
            ['Supplier Category Add'],
            ['Supplier Category Edit'],
            ['Supplier Category View'],
            ['Supplier Category Delete'],
            ['Supplier Team Member List'],
            ['Supplier Team Member Add'],
            ['Supplier Team Member Edit'],
            ['Supplier Team Member View'],
            ['Supplier Team Member Delete'],
            ['Supplier Certificate List'],
            ['Supplier Certificate Add'],
            ['Supplier Certificate Edit'],
            ['Supplier Certificate View'],
            ['Supplier Certificate Delete'],
            ['Supplier Testimonial List'],
            ['Supplier Testimonial Add'],
            ['Supplier Testimonial Edit'],
            ['Supplier Testimonial View'],
            ['Supplier Testimonial Delete'],
            ['Supplier Project List'],
            ['Supplier Project Add'],
            ['Supplier Project Edit'],
            ['Supplier Project View'],
            ['Supplier Project Delete'],
            ['Supplier Product List'],
            ['Supplier Product Add'],
            ['Supplier Product Edit'],
            ['Supplier Product View'],
            ['Supplier Product Delete'],
            ['Supplier Transaction List'],
            ['Supplier Transaction Add'],
            ['Supplier Transaction Edit'],
            ['Supplier Transaction View'],
            ['Supplier Transaction Delete'],
            ['Contractor List'],
            ['Contractor Add'],
            ['Contractor Edit'],
            ['Contractor View'],
            ['Contractor Delete'],
            ['Sub Contractor List'],
            ['Sub Contractor Add'],
            ['Sub Contractor Edit'],
            ['Sub Contractor View'],
            ['Sub Contractor Delete'],
            ['Homepage'],
            ['Slider List'],
            ['Slider Add'],
            ['Slider Delete'],
            ['Privacy Policy'],
            ['Terms of Use'],
            ['Return Refunds'],
            ['Career'],
            ['Supplier Profile View'],
            ['User Impersonate'],
            ['Dashboard'],
            ['Supplier Report Regular'],
            ['Supplier Report Clicks'],
        ];

        foreach ($inputs as $data) {
            Permission::insert([
                'name' => $data[0],
                'slug' => strtolower(str_replace(' ', '_', $data[0])),
            ]);
        }
    }
}
