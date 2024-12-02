<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodiList = [
            ['nama_prodi' => 'D3 TEKNIK MESIN', 'jurusan_id' => 4],
            ['nama_prodi' => 'D3 TEKNIK PENDINGIN DAN TATA UDARA', 'jurusan_id' => 4],
            ['nama_prodi' => 'D3 TEKNIK INFORMATIKA', 'jurusan_id' => 1],
            ['nama_prodi' => 'D3 KEPERAWATAN', 'jurusan_id' => 2],
            ['nama_prodi' => 'D4 PERANCANGAN MANUFAKTUR', 'jurusan_id' => 4],
            ['nama_prodi' => 'D4 REKAYASA PERANGKAT LUNAK', 'jurusan_id' => 1],
            ['nama_prodi' => 'D4 TEKNOLOGI REKAYASA INSTRUMENTASI DAN KONTROL', 'jurusan_id' => 3],
            ['nama_prodi' => 'D4 SISTEM INFORMASI KOTA CERDAS', 'jurusan_id' => 1],
        ];

        foreach ($prodiList as $prodi) {
            Prodi::firstOrCreate(
                ['nama_prodi' => $prodi['nama_prodi']],
                ['jurusan_id' => $prodi['jurusan_id']]
            );
        }
    }
}
