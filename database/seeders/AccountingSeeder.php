<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Accounting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::pluck('id')->toArray();

        // Loop through each order and create an associated accounting record
        foreach ($orders as $order) {
            Accounting::create([
                'street' => 'Your Street',
                'note' => 'Your Note',
                'house_number' => 123,
                'postal_code' => 12345,
                'first_name' => 'First Name',
                'last_name' => 'Last Name',
                'phone' => 1234567890,
                'order_id' => $order, // Assign the order_id
            ]);
        }
    }
}
