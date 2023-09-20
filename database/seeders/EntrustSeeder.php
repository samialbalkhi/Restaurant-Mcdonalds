<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'adminstration',
            'description' => 'adminstrator',
            'allowed_route' => 'admin',
        ]);
        $customerRole = Role::create([
            'name' => 'customer',
            'display_name' => 'customer',
            'description' => 'customer',
            'allowed_route' => null,
        ]);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $admin->attachRole($adminRole);

        $customer = User::create([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $customer->attachRole($customerRole);
        for ($i = 1; $i <= 20; $i++) {
            $random_customer = User::create([
                'name' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ]);
            $random_customer->attachRole($customerRole);
        }
    }
}
