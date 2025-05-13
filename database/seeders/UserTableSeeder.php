<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'User One',
                'email' => 'user1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password1'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Two',
                'email' => 'user2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password2'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Three',
                'email' => 'user3@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password3'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Four',
                'email' => 'user4@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password4'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Five',
                'email' => 'user5@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password5'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Six',
                'email' => 'user6@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password6'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Seven',
                'email' => 'user7@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password7'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Eight',
                'email' => 'user8@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password8'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Nine',
                'email' => 'user9@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password9'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Ten',
                'email' => 'user10@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password10'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
