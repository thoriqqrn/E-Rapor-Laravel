<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rapor Siswa</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .container { width: 100%; padding: 20px; }
        .header, .footer { text-align: center; }
        .header img { width: 100px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 8px; text-align: left; border: 1px solid black; }
        .bold { font-weight: bold; }
        .center { text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3>PEMERINTAH KABUPATEN TEBO</h3>
            <h3>DINAS PENDIDIKAN KEBUDAYAAN PEMUDA DAN OLAH RAGA</h3>
            <h3>SD NEGERI NO. 200/VIII SUNGAI KARANG</h3>
            <h4>KECAMATAN VII KOTO ILIR KABUPATEN TEBO</h4>
            <p>Jl. Poros Ds. Sungai Karang Kec. VII Koto Ilir Kab. Tebo Prov. Jambi: 37259</p>
            <hr>
            <h2>LAPORAN PENILAIAN HASIL BELAJAR SISWA SEMESTER II (GENAP)</h2>
            <h3>TAHUN PELAJARAN 2014/2015</h3>
        </div>

        <p>Nama Lengkap Siswa: <span class="bold">{{ $siswa->nama }}</span></p>
        <p>Kelas: <span class="bold">{{ $siswa->kelas }}</span></p>
        <p>NISN: <span class="bold">{{ $siswa->nisn }}</span></p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mata Pelajaran</th>
                    <th>KKM</th>
                    <th>Nilai Angka</th>
                    <th>Nilai Huruf</th>
                    <th>Deskripsi Kemajuan Belajar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nilais as $index => $nilai)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $nilai->mata_pelajaran }}</td>
                        <td>{{ $nilai->kkm }}</td>
                        <td>{{ $nilai->nilai }}</td>
                        <td>{{ $nilai->nilai_huruf }}</td>
                        <td>{{ $nilai->deskripsi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table>
            <thead>
                <tr>
                    <th>Aspek Perilaku dan Kepribadian</th>
                    <th>Nilai</th>
                    <th>Keterangan Absensi</th>
                    <th>Jumlah Hari</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data Aspek Perilaku dan Kepribadian -->
                <tr>
                    <td>Akhlak</td>
                    <td></td>
                    <td>Sakit</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kerajinan</td>
                    <td></td>
                    <td>Izin</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kedisiplinan</td>
                    <td></td>
                    <td>Tanpa Keterangan</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Kebersihan dan Kerapian</td>
                    <td></td>
                    <td>Jumlah</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>Sungai Karang, 16 Juni 2015</p>
            <p>Mengetahui</p>
            <p>Orang Tua/Wali,</p>
            <br><br>
            <p>____________________</p>
            <p>Nama Wali Kelas & Gelar</p>
            <p>NIP.</p>
        </div>
    </div>
</body>
</html>
