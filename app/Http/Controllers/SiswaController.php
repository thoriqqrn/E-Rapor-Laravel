<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller {
    public function index() {
        $siswas = Siswa::all();
        return view('siswas.index', compact('siswas'));
    }

    public function create() {
        return view('siswas.create');
    }

    public function store(Request $request) {
        Siswa::create($request->all());
        return redirect()->route('siswas.index');
    }

    // Menampilkan form untuk mengedit siswa
    public function edit(Siswa $siswa)
    {
        return view('siswas.edit', compact('siswa'));
    }

    // Memperbarui siswa
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswas.index')
                         ->with('success', 'Siswa berhasil diperbarui.');
    }

    // Menghapus siswa
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswas.index')
                         ->with('success', 'Siswa berhasil dihapus.');
    }

    public function getNilaiSiswaById($siswaId) {
        $siswa = Siswa::with('nilais')->findOrFail($siswaId);
        return response()->json(['nilais' => $siswa->nilais]);
    }
}
