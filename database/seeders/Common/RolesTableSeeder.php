<?php

namespace Database\Seeders\Common;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name'          =>  'admin',
                'guard_name'    =>  'api'
            ],
            [
                'name'          =>  'student',
                'guard_name'    =>  'api'
            ],
        ];

        array_map(function ($item) {
            Role::query()->firstOrCreate($item, $item);
        }, $roles);
    }
}

