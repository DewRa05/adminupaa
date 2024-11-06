<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jurusans')->insert([
            ['id' => 1, 'nama_jurusan' => 'Teknik Informatika'],
            ['id' => 2, 'nama_jurusan' => 'Manajemen Informatika'],
            ['id' => 3, 'nama_jurusan' => 'Teknik Elektro'],
            ['id' => 4, 'nama_jurusan' => 'Teknik Mesin'],
        ]);
    }
}
