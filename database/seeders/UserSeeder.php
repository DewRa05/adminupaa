<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Pastikan role telah dibuat sebelumnya
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'mahasiswa']);
        Role::firstOrCreate(['name' => 'dosen']);
        Role::firstOrCreate(['name' => 'umum']);
        
        // Membuat User Admin
        $admin = User::create([
            'nama' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin', // Tambahkan role di sini
            'jurusan_id' => null, // Admin tidak perlu jurusan
            'prodi_id' => null,   // Admin tidak perlu prodi
            'kelas_id' => null,   // Admin tidak perlu kelas
            'nik' => '1234567890123456', // NIK untuk umum (admin)
        ]);

        // Membuat User Mahasiswa
        $mahasiswa = User::create([
            'nama' => 'Mahasiswa A',
            'email' => 'mahasiswa@example.com',
            'password' => bcrypt('password'),
            'role' => 'mahasiswa', // Tambahkan role di sini
            'jurusan_id' => 'J01',
            'prodi_id' => '1',  // Ganti sesuai dengan ID prodi yang ada
            'kelas_id' => '1',   // Ganti sesuai dengan ID kelas yang ada
            'nim' => 'M001',     // NIM untuk mahasiswa
        ]);

        // Membuat User Dosen
        $dosen = User::create([
            'nama' => 'Dosen A',
            'email' => 'dosen_a@example.com',
            'password' => bcrypt('password'),
            'role' => 'dosen', // Tambahkan role di sini
            'jurusan_id' => 'J01', // Dosen hanya perlu jurusan
            'prodi_id' => null,     // Dosen tidak perlu prodi
            'kelas_id' => null,     // Dosen tidak perlu kelas
            'nidn' => '1234567890', // NIDN untuk dosen
        ]);

        // Membuat User Umum
        $umum = User::create([
            'nama' => 'Umum A',
            'email' => 'umum_a@example.com',
            'password' => bcrypt('password'),
            'role' => 'umum', // Tambahkan role di sini
            'jurusan_id' => null, // Umum tidak perlu jurusan
            'prodi_id' => null,   // Umum tidak perlu prodi
            'kelas_id' => null,   // Umum tidak perlu kelas
            'nik' => '9876543210123456', // NIK untuk umum
        ]);
    }
}
