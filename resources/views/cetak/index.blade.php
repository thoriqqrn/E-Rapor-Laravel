<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cetak Rapor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('cetak.rapor') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="siswa_id" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                            <select id="siswa_id" name="siswa_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm" required>
                                @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                                {{ __('Cetak') }}
                            </button>
                            <button type="button" onclick="event.preventDefault(); document.getElementById('export-form').submit();" class="ml-4 px-4 py-2 bg-green-500 text-white rounded-md">
                                {{ __('Export to Excel') }}
                            </button>
                        </div>
                    </form>
                    <form id="export-form" action="{{ route('export.excel') }}" method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" id="export_siswa_id" name="siswa_id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('siswa_id').addEventListener('change', function () {
            document.getElementById('export_siswa_id').value = this.value;
        });
    </script>
</x-app-layout>
