<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\OrderFactory;
use Database\Factories\OrderDetailFactory;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            OrderFactory::new()->count(5)->create()->each(function ($order) {
                $orderDetails = OrderDetailFactory::new()->count(5)->make([
                    'order_id' => $order->id,
                ]);
                $order->orderDetail()->saveMany($orderDetails);
            });
        });
    }
}
