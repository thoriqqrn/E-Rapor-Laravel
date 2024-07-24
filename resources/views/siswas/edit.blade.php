<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('siswas.update', $siswa->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama" class="block text-gray-700">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control block mt-1 w-full rounded-md border-gray-300 shadow-sm" value="{{ $siswa->nama }}" required>
                            @error('nama')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="kelas" class="block text-gray-700">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="form-control block mt-1 w-full rounded-md border-gray-300 shadow-sm" value="{{ $siswa->kelas }}" required>
                            @error('kelas')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h4 class="text-xl font-bold mb-4">Format Pengisian 👮‍♂️</h4>
                <div class="mb-4">
                    <p class="text-gray-700">Format pengisian siswa adalah : Nama Lengkap</p> 
                    <p class="text-gray-700">Contoh mengisi kelas adalah : 1 Pa 1</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
