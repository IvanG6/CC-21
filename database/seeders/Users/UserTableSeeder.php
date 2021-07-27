<?php

namespace Database\Seeders\Users;

use App\Models\Coach;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coach = [
            'email' => 'coach@coach.com',
            'first_name' => 'Anton',
            'last_name' => 'Coach',
            'password' => bcrypt('secret'),
            'currency_id' => 5,
            'timezone_id' => 8,
        ];

        $client = [
            'email' => 'student@student.com',
            'first_name' => 'Anton',
            'last_name' => 'Student',
            'password' => bcrypt('secret'),
            'currency_id' => 5,
            'timezone_id' => 9,
        ];

        $admin = [
            'email' => 'admin@admin.com',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'password' => bcrypt('secret'),
            'currency_id' => 5,
            'timezone_id' => 9,
        ];

        User::query()->firstOrCreate(['email' => $client['email']], $client);

        /** @var User $adminModel */
        $adminModel = User::query()->firstOrCreate(['email' => $admin['email']], $admin);

        $adminModel->syncRoles([Role::query()->where('name', 'admin')->first()]);

        /** @var Coach $coach */
        $coach = Coach::query()->firstOrCreate(['email' => $coach['email']], $coach);

        $scheduleTemplate = config('select_data.schedule_templates');

        foreach ($scheduleTemplate as $item) {
            $coach->schedules()->create(array_merge($item, ['coach_id' => $coach->id]));
        }
    }
}
