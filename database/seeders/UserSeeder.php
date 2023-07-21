<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
                [
                    'username' => 'muratAydın',
                    'usertitle' => 'admin',
                    'password' => Hash::make('123456'),
                ],
                [
                    'username' => 'ahmet',
                    'usertitle' => 'admin',
                    'password' => Hash::make('123456'),
                ]
            ]
        );
    }
}
