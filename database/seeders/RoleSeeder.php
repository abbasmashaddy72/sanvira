<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            ['1', 'Super Admin'],
            ['2', 'Admin'],
            ['3', 'Supplier'],
            ['4', 'Contractor'],
            ['5', 'Sub Contractor'],
            ['6', 'Manufacturer'],
            ['7', 'Developer'],
        ];

        foreach ($inputs as $data) {
            Role::create([
                'id' => $data[0],
                'name' => $data[1],
                'slug' => str_replace(strtolower($data[1]), ' ', '_'),
            ]);
        }
    }
}
