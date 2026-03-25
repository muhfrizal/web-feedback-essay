<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'nip' =>'1234',
            'nama'=>'bahlul',
            'satuan_kerja' => 'vava',
            'password' => bcrypt('wasd')
        ]);
    }
}
