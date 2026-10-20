<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Akta
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('aktas.update', $akta->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium">Klien</label>

                        <select name="client_id"
                            class="w-full border rounded-lg p-2">

                            @foreach($clients as $client)

                                <option value="{{ $client->id }}"
                                    {{ $client->id == $akta->client_id ? 'selected' : '' }}>

                                    {{ $client->nama }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">
                            Nomor Akta
                        </label>

                        <input
                            type="text"
                            name="nomor_akta"
                            value="{{ $akta->nomor_akta }}"
                            class="w-full border rounded-lg p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">
                            Jenis Akta
                        </label>

                        <input
                            type="text"
                            name="jenis_akta"
                            value="{{ $akta->jenis_akta }}"
                            class="w-full border rounded-lg p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">
                            Tanggal Akta
                        </label>

                        <input
                            type="date"
                            name="tanggal_akta"
                            value="{{ $akta->tanggal_akta }}"
                            class="w-full border rounded-lg p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">
                            Status
                        </label>

                        <select
                            name="status"
                            class="w-full border rounded-lg p-2">

                            <option value="Proses"
                                {{ $akta->status == 'Proses' ? 'selected' : '' }}>
                                Proses
                            </option>

                            <option value="Selesai"
                                {{ $akta->status == 'Selesai' ? 'selected' : '' }}>
                                Selesai
                            </option>

                            <option value="Diambil"
                                {{ $akta->status == 'Diambil' ? 'selected' : '' }}>
                                Diambil
                            </option>

                        </select>

                    </div>

                    <button
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Update
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>