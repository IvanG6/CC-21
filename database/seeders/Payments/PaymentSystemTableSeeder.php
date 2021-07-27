<?php

namespace Database\Seeders\Payments;

use App\Models\PaymentSystem;
use Illuminate\Database\Seeder;

class PaymentSystemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paymentSystems = [
            [
                'name' => 'paypal',
                'display_name' => 'Paypal',
                'is_active' => true,
            ],
            [
                'name' => 'stripe',
                'display_name' => 'Stripe',
                'is_active' => false,
            ]
        ];

        array_map(static function (array $item) {
            PaymentSystem::query()->firstOrCreate(['name' => $item['name']], $item);
        }, $paymentSystems);
    }
}
