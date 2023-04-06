<?php

namespace Database\Seeders;

use App\Models\PaymentGateway;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Faruq Hossen',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'mobile' => '234234',
            'is_admin' => false,
            'is_user' => true,
            'password' => Hash::make('123')
        ]);

        User::create([
            'name' => 'Club Holder',
            'username' => 'club',
            'email' => 'club@gmail.com',
            'mobile' => '453434',
            'is_admin' => false,
            'is_user' => false,
            'is_club' => true,
            'password' => Hash::make('123')
        ]);

        PaymentGateway::create([
            'bank' => 'Bkash',
            'type' => 'personal',
            'number' => '01928406434',
        ]);
    }
}
