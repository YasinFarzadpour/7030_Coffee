<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'yasin',
            'username'=>'yasin91',
            'email'=>'yasin@gmail.com',
            'password'=>Hash::make('password')
        ])->assignRole('Super Admin');
    }
}
