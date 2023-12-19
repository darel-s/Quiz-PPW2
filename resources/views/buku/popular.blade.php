<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Buku Populer
            </h2>
            <a href="{{ route('buku.index') }}" class="text-blue-500 hover:underline">Back to Books</a>
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4">
        @if ($buku->isEmpty())
            <div class="text-center py-8">
                <p class="text-gray-600">There are no books available.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($buku as $buku)
                    <div class="bg-white shadow-md p-4 rounded-md">
                        @if ($buku->filepath)
                            <img src="{{ asset($buku->filepath) }}" alt="{{ $buku->judul }}" class="w-full h-40 object-cover mb-4 rounded-md">
                        @endif
                        <h3 class="text-xl font-semibold">{{ $buku->judul }}</h3>
                        <p class="text-gray-600">{{ $buku->penulis }}</p>
                        <p class="text-gray-600">Rating: {{ $buku->rating }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>