<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // Admin
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'setor_id' => 1,
                'supervisor_id' => 1,
                'matricula' => '12345',
                'password' => Hash::make('12345'),
                'regras' => 'admin',
                'status' => '1',
            ],
                // supervisor
            [
                'name' => 'Supervisor',
                'matricula' => '123456',
                'setor_id' => 1,
                'supervisor_id' => 1,
                'email' => 'supervisor@gmail.com',
                'password' => Hash::make('12345'),
                'regras' => 'supervisor',
                'status' => '1',
            ],
                // User
            [
                'name' => 'User',
                'matricula' => '123457',
                'setor_id' => 1,
                'supervisor_id' => 1,
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345'),
                'regras' => 'user',
                'status' => '1',
            ],

        ]);
    }
}
