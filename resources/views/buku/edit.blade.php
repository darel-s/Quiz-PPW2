<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Buku
        </h2>
    </x-slot>
    <body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Edit Buku</h2>
        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block text-gray-700 font-bold">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ $buku->judul }}" class="border border-gray-300 rounded px-3 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="penulis" class="block text-gray-700 font-bold">Penulis</label>
                <input type="text" name="penulis" id="penulis" value="{{ $buku->penulis }}" class="border border-gray-300 rounded px-3 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-gray-700 font-bold">Harga</label>
                <input type="text" name="harga" id="harga" value="{{ $buku->harga }}" class="border border-gray-300 rounded px-3 py-2 w-full">
            </div>
            <div class="mb-4">
                <label for="tgl_terbit" class="block text-gray-700 font-bold">Tanggal Terbit</label>
                <input type="date" name="tgl_terbit" id="tgl_terbit" value="{{ $buku->tgl_terbit }}" class="border border-gray-300 rounded px-3 py-2 w-full">
            </div>
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
                <a href="/buku" class="text-gray-600 ml-2">Batal</a>
            </div>
        </form>
    </div>
</body>
</x-app-layout>