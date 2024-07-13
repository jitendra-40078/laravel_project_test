<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('admins')->insert([
        'image' => '',
        'name' => 'DareeSoft',
        'email' => 'amit@kwebmaker.com',
        'username' => 'admin@dareesoft',
        'password_txt' => 'admin@dareesoft', // Note: Storing plaintext passwords is not recommended
        'password_enc' => Hash::make('admin@dareesoft'), // Use hashed password
        'type' => 'SA', // or 'SA'
        'role_id' => null, // Assuming a role with ID 1 exists
        'status' => 'A', // or 'D'
        'created_at' => now(),
        'updated_at' => now()
      ]);
    }
}
