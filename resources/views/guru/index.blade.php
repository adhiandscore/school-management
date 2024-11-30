@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl text-white font-bold mb-4">Daftar Guru</h1>

    <!-- Tampilkan pesan sukses -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-900 px-4 py-3 rounded mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data Guru -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 text-left font-medium text-gray-900 border-b">#</th>
                    <th class="px-4 py-2 text-left font-medium text-gray-900 border-b">Nama</th>
                    <th class="px-4 py-2 text-left font-medium text-gray-900 border-b">Kelas yang Diampu</th>
                    <th class="px-4 py-2 text-left font-medium text-gray-900 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($gurus as $guru)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 text-gray-900">{{ $guru->nama ?? '' }}</td>
                        <td class="px-4 py-2 text-gray-900">
                            @if($guru->gurus->isNotEmpty())
                                @foreach($guru->kelases as $kelas)
                                    {{ $kelas->nama ?? '' }}@if(!$loop->last), @endif
                                @endforeach
                            @else
                                <em class="text-gray-600">Belum mengampu kelas</em>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('edit.guru', $guru->id) }}" class="inline-block bg-black-500 hover:bg-yellow-600 text-white font-semibold py-1 px-3 rounded shadow">Edit</a>
                            <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded shadow" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-600">Tidak ada data guru.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Tombol Tambah Guru -->
    <div class="mt-6">
        <a href="{{ route('form.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">Tambah Guru</a>
    </div>
</div>
@endsection
