<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('siswas.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input id="nama" name="nama" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                        </div>
                        <div class="mb-4">
                            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <input id="kelas" name="kelas" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                                {{ __('Simpan') }}
                            </button>
                        </div>
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
