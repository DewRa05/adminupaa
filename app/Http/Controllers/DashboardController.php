<?php

namespace App\Http\Controllers;

use App\Models\PelatihanUser;
use App\Models\User;
use App\Models\Pelatihan;
use App\Models\Sertifikat;

class DashboardController extends Controller
{
    public function index()
    {
        // Count Use Yang Mendaftar
        $userCount          = User::count();
        $userDosenCount     = User::where('role', 'dosen')->count();
        $userMahasiswaCount = User::where('role', 'mahasiswa')->count();
        $userUmumCount      = User::where('role', 'masyarakat')->count();
        
        $pelatihanCount     = Pelatihan::count();
        $sertifikatCount    = Sertifikat::count();

        // Count User Yang Mengikuti Pelatihan
        $pelatihanUserCount     = PelatihanUser::count();
        $pendingParticipants    = PelatihanUser::where('status_pendaftaran', 'menunggu')->count();
        $acceptedParticipants   = PelatihanUser::where('status_pendaftaran', 'diterima')->count();
        $rejectedParticipants   = PelatihanUser::where('status_pendaftaran', 'ditolak')->count();

        return view('admin.dashboard', compact(
            'userCount',
            'userDosenCount', 
            'userMahasiswaCount', 
            'userUmumCount', 
            'pelatihanCount', 
            'sertifikatCount', 
            'pelatihanUserCount', 
            'pendingParticipants', 
            'acceptedParticipants', 
            'rejectedParticipants'
        ));
        
    }
}
