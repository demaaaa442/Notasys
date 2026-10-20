<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Klien
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

    <form action="{{ route('clients.index') }}" method="GET" class="flex items-center gap-3">

        <input
            type="text"
            name="search"
            value="{{ $search ?? '' }}"
            placeholder="Cari nama atau NIK..."
            class="border rounded-lg px-4 py-2">

<button
    style="background-color:#2563eb;
           color:white;
           padding:10px 18px;
           border:none;
           border-radius:8px;
           cursor:pointer;">
    Cari
</button>

<a href="{{ route('clients.index') }}"
   style="background-color:#6b7280;
          color:white;
          padding:10px 18px;
          border-radius:8px;
          text-decoration:none;
          display:inline-block;">
    Reset
</a>

</form>

<a href="{{ route('clients.create') }}"
   style="background-color:#2563eb;
          color:white;
          padding:10px 18px;
          border-radius:8px;
          text-decoration:none;
          display:inline-block;">
    + Tambah Klien
</a>

</div>

<p class="mb-3 text-gray-700">
    Total Klien :
    <strong>{{ $clients->count() }}</strong>
</p>

<div class="bg-white shadow rounded-lg p-6 overflow-x-auto">
    <table class="w-full border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="border p-2 text-center w-16">No</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">NIK</th>
                <th class="border p-2">Telepon</th>
                <th class="border p-2">Alamat</th>
                <th class="border p-2"text-center w-44">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($clients as $client)
            <tr class="hover:bg-gray-50">
                <td class="border p-2 text-center">
                    {{ $loop->iteration }}
                </td>

                <td class="border p-2">
                    {{ $client->nama }}
                </td>

                <td class="border p-2">
                    {{ $client->nik }}
                </td>

                <td class="border p-2">
                    {{ $client->telepon }}
                </td>

                <td class="border p-2">
                    {{ $client->alamat }}
                </td>

                <td class="border p-2 text-center">
                    <div class="flex justify-center gap-2">

                        <a href="{{ route('clients.edit', $client->id) }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded">
                            Edit
                        </a>

                        <form action="{{ route('clients.destroy', $client->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                <td colspan="6" class="border p-2 text-center">
                    Belum ada data klien.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
        </div>
    </div>
</x-app-layout>