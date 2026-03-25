<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Soal;


class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Soal::insert([
            ['nomor' => 1, 'pertanyaan' => 'Jelaskan pengertian Pancasila'],
            ['nomor' => 2, 'pertanyaan' => 'Apa fungsi Pancasila bagi bangsa Indonesia'],
            ['nomor' => 3, 'pertanyaan' => 'Sebutkan nilai-nilai Pancasila']
        ]);
    }
}
