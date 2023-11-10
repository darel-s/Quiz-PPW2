<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Buku
        </h2>
    </x-slot>
    
    <body class="bg-gray-100">
        <div class="container mx-auto mt-10 p-4">
            <form action="{{ route('buku.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="judul" class="block text-gray-600">Judul Buku</label>
                    <input type="text" id="judul" name="judul" class="border border-gray-300 rounded px-3 py-2 w-full">
                </div>

                <div class="mb-4">
                    <label for="penulis" class="block text-gray-600">Penulis</label>
                    <input type="text" id="penulis" name="penulis" class="border border-gray-300 rounded px-3 py-2 w-full">
                </div>

                <div class="mb-4">
                    <label for="harga" class="block text-gray-600">Harga</label>
                    <input type="text" id="harga" name="harga" class="border border-gray-300 rounded px-3 py-2 w-full">
                </div>

                <div class="mb-4">
                    <label for="tgl_terbit" class="block text-gray-600">Tanggal Terbit</label>
                    <input type="date" id="tgl_terbit" name="tgl_terbit" class="border border-gray-300 rounded px-3 py-2 w-full">
                </div>

                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                    <a href="/buku" class="text-gray-600 ml-2">Batal</a>
                </div>
            </form>
        </div>
    </body>
</x-app-layout>
