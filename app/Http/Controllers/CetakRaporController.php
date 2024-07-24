<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\SiswaNilaiExport;
use Maatwebsite\Excel\Facades\Excel;

class CetakRaporController extends Controller
{
    // Menampilkan halaman cetak rapor
    public function index()
    {
        $siswas = Siswa::all();
        return view('cetak.index', compact('siswas'));
    }

    // Mencetak rapor siswa
    public function cetak(Request $request)
    {
        $siswa = Siswa::findOrFail($request->siswa_id);
        $nilais = Nilai::where('siswa_id', $siswa->id)->get();
        $pdf = Pdf::loadView('cetak.rapor', compact('siswa', 'nilais'));
        return $pdf->download('rapor-' . $siswa->nama . '.pdf');
    }

    public function exportExcel(Request $request)
    {
        $siswaId = $request->input('siswa_id');
        $siswa = Siswa::with('nilais')->findOrFail($siswaId);

        return Excel::download(new SiswaNilaiExport($siswa), 'nilai_siswa.xlsx');
    }

}
