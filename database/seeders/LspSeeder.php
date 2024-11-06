<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LspSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the LSPs to be inserted
        $lspData = [
            ['id' => 'LSP001', 'nama' => 'Lembaga Sertifikasi Profesi A'],
            ['id' => 'LSP002', 'nama' => 'Lembaga Sertifikasi Profesi B'],
            ['id' => 'LSP003', 'nama' => 'Lembaga Sertifikasi Profesi C'],
            ['id' => 'LSP004', 'nama' => 'Lembaga Sertifikasi Profesi D'],
            ['id' => 'LSP005', 'nama' => 'Lembaga Sertifikasi Profesi E'],
        ];

        // Insert the LSPs into the 'lsp' table
        DB::table('lsp')->insert($lspData);
    }
}
