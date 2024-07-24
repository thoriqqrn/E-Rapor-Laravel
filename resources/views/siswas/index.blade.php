<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    
    <!-- Custom CSS -->
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: none;
            border: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #3490dc;
            color: white !important;
            border: none;
            border-radius: 4px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background: #2779bd;
            color: white !important;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body>

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Daftar Siswa') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('siswas.create') }}" class="btn btn-primary mb-4">Tambah Siswa</a>
                        <table id="siswaTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswas as $siswa)
                                    <tr>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->kelas }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('siswas.edit', $siswa->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Delete</button>
                                            </form>
                                            <button type="button" class="btn btn-info btn-sm show-siswa-btn" data-siswa-id="{{ $siswa->id }}">Show</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <!-- Modal -->
    <div class="modal fade" id="siswaModal" tabindex="-1" role="dialog" aria-labelledby="siswaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="siswaModalLabel">Rincian Nilai Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="detailTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Mata Pelajaran</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data akan dimasukkan di sini oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#siswaTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
                }
            });

            // Event handler for Show button
            $('.show-siswa-btn').on('click', function() {
                var siswaId = $(this).data('siswa-id');
                
                $.ajax({
                    url: '/api/getNilaiSiswa/' + siswaId,
                    method: 'GET',
                    success: function(data) {
                        var tbody = $('#detailTable tbody');
                        tbody.empty();

                        data.nilais.forEach(function(nilai) {
                            var row = '<tr>' +
                                '<td>' + nilai.mata_pelajaran + '</td>' +
                                '<td>' + nilai.nilai + '</td>' +
                                '</tr>';
                            tbody.append(row);
                        });

                        $('#siswaModal').modal('show');
                    }
                });
            });
        });
    </script>
</body>
</html>
