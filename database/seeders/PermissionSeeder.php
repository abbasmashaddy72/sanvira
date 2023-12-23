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
            'Role List',
            'Role Add',
            'Role Edit',
            'Role View',
            'Role Delete',
            'User List',
            'User Add',
            'User Edit',
            'User View',
            'User Delete',
            'Category List',
            'Category Add',
            'Category Edit',
            'Category View',
            'Category Delete',
            'Product List',
            'Product Add',
            'Product Edit',
            'Product View',
            'Product Delete',
            'Product Review List',
            'Product Review Add',
            'Product Review Edit',
            'Product Review View',
            'Product Review Delete',
            'Rfq List',
            'Rfq Add',
            'Rfq Edit',
            'Rfq View',
            'Rfq Delete',
            'Testimonial List',
            'Testimonial Add',
            'Testimonial Edit',
            'Testimonial View',
            'Testimonial Delete',
            'Contact Us List',
            'Contact Us Edit',
            'Slider List',
            'Slider Add',
            'Slider Delete',
            'Homepage',
            'Privacy Policy',
            'Terms of Use',
            'Return Refunds',
            'User Impersonate',
            'Dashboard',
        ];

        foreach ($inputs as $data) {
            Permission::insert([
                'name' => $data,
                'slug' => strtolower(str_replace(' ', '_', $data)),
            ]);
        }
    }
}
