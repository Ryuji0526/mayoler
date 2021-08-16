<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->create();
        \DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@mayoler.com',
                'email_verified_at' => now(),
                'password' => \Hash::make('123456789'),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'role' => 1,
            ],
            [
                'name' => 'nonadmin',
                'email' => 'nonadmin@mayoler.com',
                'email_verified_at' => now(),
                'password' => \Hash::make('123456789'),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'role' => 2,
            ]
        ]);
    }
}