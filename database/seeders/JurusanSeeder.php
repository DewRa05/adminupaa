<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jurusans')->insert([
            ['nama_jurusan' => 'Teknik Informatika'],
            ['nama_jurusan' => 'Manajemen Informatika'],
            ['nama_jurusan' => 'Teknik Elektro'],
            ['nama_jurusan' => 'Teknik Mesin'],
        ]);
    }
}
