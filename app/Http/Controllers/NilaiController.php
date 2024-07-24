<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller {
    public function index() {
        $nilais = Nilai::with('siswa')->get();
        return view('nilais.index', compact('nilais'));
    }

    public function create() {
        $siswas = Siswa::all();
        return view('nilais.create', compact('siswas'));
    }

    public function store(Request $request) {
        Nilai::create($request->all());
        return redirect()->route('nilais.index');
    }

    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        return view('nilais.edit', compact('nilai'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|numeric',
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());

        return redirect()->route('nilais.index')->with('success', 'Nilai berhasil diupdate');
    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('nilais.index')->with('success', 'Nilai berhasil dihapus');
    }

}
