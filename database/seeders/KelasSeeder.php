<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insert([
            ['id' => 1, 'nama_kelas' => 'Kelas A', 'prodi_id' => 1],
            ['id' => 2, 'nama_kelas' => 'Kelas B', 'prodi_id' => 2],
            ['id' => 3, 'nama_kelas' => 'Kelas C', 'prodi_id' => 3],
        ]);
    }
}
