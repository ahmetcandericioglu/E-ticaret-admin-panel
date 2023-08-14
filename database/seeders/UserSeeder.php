<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Testing\Fluent\Concerns\Has;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

//        User::create([
//                'usertitle' => 'admin',
//                'username' => 'muratAydın',
//                'password' => Hash::make('123456'),
//            ]);
        $faker = Factory::create();
        for ($i = 0; $i < 1000; $i++){
            User::create([
                'username' => $faker->userName,
                'usertitle' => $faker->title,
                'password' => Hash::make('123456'),
            ]);
        }

    }
}
