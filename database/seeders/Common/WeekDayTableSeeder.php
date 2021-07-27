<?php

namespace Database\Seeders\Common;

use App\Models\WeekDay;
use Illuminate\Database\Seeder;

class WeekDayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            [
                'name' => 'Monday',
            ],
            [
                'name' => 'Tuesday',
            ],
            [
                'name' => 'Wednesday',
            ],
            [
                'name' => 'Thursday',
            ],
            [
                'name' => 'Friday',
            ],
            [
                'name' => 'Saturday',
            ],
            [
                'name' => 'Sunday',
            ],
        ];

        array_map(function (array $item) {
            WeekDay::query()->firstOrCreate($item, $item);
        }, $days);
    }
}
