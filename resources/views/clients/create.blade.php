<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Klien
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-medium">Nama</label>
                        <input type="text" name="nama"
                            class="w-full border rounded-lg p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">NIK</label>
                        <input type="text" name="nik"
                            class="w-full border rounded-lg p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Telepon</label>
                        <input type="text" name="telepon"
                            class="w-full border rounded-lg p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Alamat</label>
                        <textarea name="alamat"
                            class="w-full border rounded-lg p-2"
                            rows="4" required></textarea>
                    </div>

                    <button type="submit"
                        style="background-color:#2563eb; color:white; padding:10px 20px; border-radius:8px;">
                        Simpan
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>