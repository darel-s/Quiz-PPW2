<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Buku
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-12">
            <div class="container mx-auto mt-10 bg-white p-6 rounded-md">
                <form action="{{ route('buku.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="judul" class="block text-gray-600">Judul Buku</label>
                        <input type="text" id="judul" name="judul" placeholder="Masukkan Judul Buku" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="penulis" class="block text-gray-600">Penulis</label>
                        <input type="text" id="penulis" name="penulis" placeholder="Masukkan Nama Penulis" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="harga" class="block text-gray-600">Harga</label>
                        <input type="text" id="harga" name="harga" placeholder="Masukkan Harga Buku" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>

                    <div class="mb-4">
                        <label for="tgl_terbit" class="block text-gray-600">Tanggal Terbit</label>
                        <input type="date" id="tgl_terbit" name="tgl_terbit" class="border border-gray-300 rounded px-3 py-2 w-full">
                    </div>

                    <div class="mb-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Tambah Buku</button>
                        <a href="/buku" class="text-gray-600">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
