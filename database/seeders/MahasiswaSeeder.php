<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'user_id' => 1,
            'kelas_id' => 2,
            'nim' => '220302034',
            'name' => 'farah nada',
            'tempat_lahir' => 'kebumen',
            'tanggal_lahir' => now()->subYears(rand(18, 22))->toDateString(),
            'edit' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
