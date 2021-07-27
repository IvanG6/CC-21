<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Nova\PrivacyPolicy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::query()->firstOrCreate(['slug'=>'privacy-policy'], ['title'=>'Privacy Policy', 'content'=>'Hello!!']);


    }
}
