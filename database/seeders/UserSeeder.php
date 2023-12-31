<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('app.env') == 'production') {
            $user = User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@kasperpro.com',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]);
            $user->roles()->attach([1]);
        } else {
            $users = User::factory()->count(rand(100, 300))->create();
            $superAdmin = $users->first();
            $superAdmin->update([
                'email' => 'superadmin@kasperpro.com',
            ]);

            foreach ($users as $user) {
                if ($user->id == 1) {
                    $user->roles()->attach([1]);
                }
                if ($user->id != 1) {
                    $user->roles()->attach([rand(1, 3)]);
                }
            }
        }
    }
}
