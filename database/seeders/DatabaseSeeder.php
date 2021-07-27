<?php

namespace Database\Seeders;

use Database\Seeders\Chat\ChatTableSeeder;
use Database\Seeders\Common\RolesTableSeeder;
use Database\Seeders\Common\WeekDayTableSeeder;
use Database\Seeders\Payments\PaymentSystemTableSeeder;
use Database\Seeders\Users\UserTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WeekDayTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PaymentSystemTableSeeder::class);
        $this->call(ChatTableSeeder::class);
        $this->call(PageSeeder::class);
    }
}
