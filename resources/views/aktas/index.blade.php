<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Akta
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4 flex justify-between items-center">

                <form action="{{ route('aktas.index') }}" method="GET" class="flex gap-2">

                    <input
                        type="text"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Cari nomor, klien, atau jenis akta..."
                        class="border rounded-lg px-4 py-2">

                    <button
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Cari
                    </button>

                    <a href="{{ route('aktas.index') }}"
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg">
                        Reset
                    </a>

                </form>

                <a href="{{ route('aktas.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                    + Tambah Akta
                </a>

            </div>

            <p class="mb-3 text-gray-600">
                Jumlah Data :
                <strong>{{ $aktas->count() }}</strong>
            </p>

            <div class="bg-white shadow rounded-lg p-6 overflow-x-auto">

                <h3 class="text-lg font-semibold mb-4">
                    Daftar Data Akta
                </h3>
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border p-2">No</th>
                            <th class="border p-2">Nomor Akta</th>
                            <th class="border p-2">Klien</th>
                            <th class="border p-2">Jenis Akta</th>
                            <th class="border p-2">Tanggal</th>
                            <th class="border p-2">Status</th>
                            <th class="border p-2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($aktas as $akta)

                        <tr>
                            <td class="border p-2">{{ $loop->iteration }}</td>

                            <td class="border p-2">
                                {{ $akta->nomor_akta }}
                            </td>

                            <td class="border p-2">
                                {{ $akta->client->nama }}
                            </td>

                            <td class="border p-2">
                                {{ $akta->jenis_akta }}
                            </td>

                            <td class="border p-2">
                                {{ $akta->tanggal_akta }}
                            </td>

                            <td class="border p-2">
                                {{ $akta->status }}
                            </td>

                            <td class="border p-2 text-center">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('aktas.edit', $akta->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('aktas.destroy', $akta->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data akta ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
                                            Hapus
                                        </button>

                                    </form>

                                </div>

                            </td>
            
                        </tr>

                        @empty

                        <tr>
                            <td colspan="7" class="border p-2 text-center">
                                Belum ada data akta.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>
</x-app-layout>    