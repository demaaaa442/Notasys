<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Data Akta
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('aktas.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium mb-2">Nama Klien</label>

                        <select name="client_id"
                                class="w-full border rounded-lg p-2"
                                required>

                            <option value="">-- Pilih Klien --</option>

                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">
                                    {{ $client->nama }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Nomor Akta</label>

                        <input
                            type="text"
                            name="nomor_akta"
                            class="w-full border rounded-lg p-2"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Jenis Akta</label>

                        <input
                            type="text"
                            name="jenis_akta"
                            class="w-full border rounded-lg p-2"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Tanggal Akta</label>

                        <input
                            type="date"
                            name="tanggal_akta"
                            class="w-full border rounded-lg p-2"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Status</label>

                        <select
                            name="status"
                            class="w-full border rounded-lg p-2"
                            required>

                            <option value="">-- Pilih Status --</option>
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>

                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Keterangan</label>

                        <textarea
                            name="keterangan"
                            rows="4"
                            class="w-full border rounded-lg p-2"></textarea>
                    </div>

                    <button
                        type="submit"
                        style="background:#2563eb;
                               color:white;
                               padding:10px 20px;
                               border:none;
                               border-radius:8px;">
                        Simpan
                    </button>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>