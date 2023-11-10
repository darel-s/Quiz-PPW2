<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Buku
        </h2>
    </x-slot>

    <body class="bg-gray-100">
        <div class="container mx-auto mt-10 p-4">
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('buku.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Tambah Buku</a>

                <form action="{{ route('buku.search') }}" method="GET" class="flex">
                    <input type="text" name="search" placeholder="Cari Buku" class="rounded-l py-2 px-4 border-t border-b border-l text-gray-800 border-gray-200 bg-white" />
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded-r">Cari</button>
                </form>
            </div>

            <table class="w-full border-collapse border border-gray-300 bg-white shadow-md">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">No.</th>
                        <th class="px-4 py-2 border border-gray-300">Judul Buku</th>
                        <th class="px-4 py-2 border border-gray-300">Penulis</th>
                        <th class="px-4 py-2 border border-gray-300">Harga</th>
                        <th class="px-4 py-2 border border-gray-300">Tgl. Terbit</th>
                        <th class="px-4 py-2 border border-gray-300">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 0; @endphp
                    @foreach ($data_buku as $buku)
                    <tr>
                        <td class="px-4 py-2 border border-gray-300">{{ ++$no }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            @if ($buku->filepath)
                            <div class="relative h-10 w-10">
                                <img class="h-full w-full rounded-full object-cover object-center" src="{{ asset($buku->filepath) }}" alt="" style="padding-right: 20px;" />
                            </div>
                            @endif
                            {{ $buku->judul }}
                        </td>
                        <td class="px-4 py-2 border border-gray-300">{{ $buku->penulis }}</td>
                        <td class="px-4 py-2 border border-gray-300">Rp {{ number_format($buku->harga, 2) }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $buku->tgl_terbit }}</td>
                        <td class="px-4 py-2 border border-gray-300">
                            <a href="{{ route('buku.edit', $buku->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin mau dihapus?')" class="text-red-500 hover:text-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @include('buku.pagination', ['paginator' => $data_buku])

            <div class="w-full flex flex-col items-center my-3">
                <div class="flex flex-col">{{$data_buku->links()}}</div>
            </div>

            <div class="mt-6 p-4 bg-white shadow-md">
                <p class="text-lg">Jumlah buku yang tersedia: {{ $jumlah_buku }}</p>
                <p class="text-lg">Total harga dari seluruh buku: Rp {{ number_format($total_harga, 2) }}</p>
            </div>
        </div>
    </body>
</x-app-layout>
