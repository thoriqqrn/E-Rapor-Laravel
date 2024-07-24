<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaNilaiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $siswa;

    public function __construct(Siswa $siswa)
    {
        $this->siswa = $siswa;
    }

    public function collection()
    {
        return $this->siswa->nilais;
    }

    public function headings(): array
    {
        return [
            'Mata Pelajaran',
            'Nilai'
        ];
    }

    public function map($nilai): array
    {
        return [
            $nilai->mata_pelajaran,
            $nilai->nilai,
        ];
    }
}
