<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Dashboard') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (Untuk Icon) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .card-custom {
            border-radius: 0.25rem;
            color: #fff;
            padding: 20px;
            position: relative;
            display: block;
            background: linear-gradient(135deg, #6f42c1, #e83e8c);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 1.5rem;
        }
        .card-custom .inner {
            padding: 10px;
        }
        .card-custom h3 {
            font-size: 2.5rem;
            margin: 0;
        }
        .card-custom p {
            font-size: 1.2rem;
        }
        .card-custom .icon {
            top: 10px;
            right: 10px;
            font-size: 3rem;
            opacity: 0.15;
            position: absolute;
            z-index: 0;
        }
        .card-custom-footer {
            background: rgba(0,0,0,0.1);
            border-top: 1px solid rgba(0,0,0,0.125);
            color: rgba(0,0,0,0.6);
            display: block;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            font-size: 0.875rem;
        }
        .card-custom-footer:hover {
            color: #000;
            background: rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- Login Message -->
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged in! ") }} {{ Auth::user()->name }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Bootstrap Cards -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container mt-4">
                        <div class="row">
                            <!-- Card 1: Jumlah Siswa -->
                            <div class="col-lg-6 col-12 mb-4">
                                <div class="card-custom">
                                    <div class="inner">
                                        <h3>{{ $jumlahSiswa }}</h3>
                                        <p>Jumlah Siswa</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <a href="{{ route('siswas.index') }}" class="card-custom-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <!-- Card 2: Jumlah Nilai -->
                            <div class="col-lg-6 col-12 mb-4">
                                <div class="card-custom">
                                    <div class="inner">
                                        <h3>{{ $jumlahNilai }}</h3>
                                        <p>Jumlah Nilai</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-clipboard-list"></i>
                                    </div>
                                    <a href="{{ route('nilais.index') }}" class="card-custom-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </x-app-layout>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
