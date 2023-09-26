<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class GuestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'guest@guest.com'],
            [
                'name' => 'ゲストユーザー',
                'password' => bcrypt('guestpassword'),
                'myinfo' => 'ゲストユーザーです．'
            ]
        );
    }
}
