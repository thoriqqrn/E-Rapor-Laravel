<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Nilai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('nilais.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="siswa_id" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                            <select id="siswa_id" name="siswa_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" required>
                                @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="mata_pelajaran" class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
                            <input id="mata_pelajaran" name="mata_pelajaran" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
                        </div>
                        <div class="mb-4">
                            <label for="nilai" class="block text-sm font-medium text-gray-700">Nilai</label>
                            <input id="nilai" name="nilai" type="number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required />
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
                    <p class="text-gray-700">Format pengisian Mata Pelajaran adalah : Matematika</p> 
                    <p class="text-gray-700">Contoh mengisi nilai adalah : 98</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
