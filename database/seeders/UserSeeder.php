<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Joe Mazloum',
                'email' => 'joemazloum953@gmail.com',
                'role' => 'admin',
                'phone' => '+96170285659',
                'password' => bcrypt('qwe123BNM%^&'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Anthony Habr',
                'email' => 'tony.haber92@gmail.com',
                'role' => 'admin',
                'phone' => '+9613108468',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Edward Bejjani',
                'email' => 'edwardbejjani@gmail.com',
                'role' => 'staff',
                'phone' => '+96170585121',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Melanie Jabanian',
                'email' => 'jabanianmelany@gmail.com',
                'role' => 'staff',
                'phone' => '+96176406524',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Abed Jradeh',
                'email' => 'abed.zjradeh@gmail.com',
                'role' => 'staff',
                'phone' => '+96171481953',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Elie Khairallah',
                'email' => 'e.khairallah@gmail.com',
                'role' => 'client',
                'phone' => '+96170921670',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Ali Talal Hamieh',
                'email' => 'zeinabsh9_8@icloud.com',
                'role' => 'client',
                'phone' => '+96181861600',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Fatima Khansa',
                'email' => 'fatimakhansa97@gmail.com',
                'role' => 'client',
                'phone' => '+96181893865',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Elie Kai',
                'email' => 'Kaitrading.co@gmail.com',
                'role' => 'client',
                'phone' => '+96176656054',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Tony ZSpecial',
                'email' => 'support@z-special.com',
                'role' => 'client',
                'phone' => '+96181495312',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
