<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriPelatihan;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['nama' => 'Assesor Kompetensi'],
            ['nama' => 'Pelatihan Manajemen'],
            ['nama' => 'Pelatihan IT'],
            ['nama' => 'Pelatihan Soft Skill'],
            ['nama' => 'Pelatihan Teknik'],
        ];

        foreach ($categories as $category) {
            KategoriPelatihan::create($category);
        }
    }
}
