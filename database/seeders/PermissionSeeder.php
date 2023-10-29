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
            'Billing Address List',
            'Billing Address Add',
            'Billing Address Edit',
            'Billing Address View',
            'Billing Address Delete',
            'Shipping Address List',
            'Shipping Address Add',
            'Shipping Address Edit',
            'Shipping Address View',
            'Shipping Address Delete',
            'Brand List',
            'Brand Add',
            'Brand Edit',
            'Brand View',
            'Brand Delete',
            'Vendor List',
            'Vendor Add',
            'Vendor Edit',
            'Vendor View',
            'Vendor Delete',
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
            'Enquiry List',
            'Enquiry Add',
            'Enquiry Edit',
            'Enquiry View',
            'Enquiry Delete',
            'Quotation List',
            'Quotation Add',
            'Quotation Edit',
            'Quotation View',
            'Quotation Delete',
            'Order List',
            'Order Add',
            'Order Edit',
            'Order View',
            'Order Delete',
            'Delivery Note List',
            'Delivery Note Add',
            'Delivery Note Edit',
            'Delivery Note View',
            'Delivery Note Delete',
            'Invoice List',
            'Invoice Add',
            'Invoice Edit',
            'Invoice View',
            'Invoice Delete',
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
