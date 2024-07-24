<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Nilai;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Siswa::count();
        $jumlahNilai = Nilai::count();

        return view('dashboard', compact('jumlahSiswa', 'jumlahNilai'));
    }
}
