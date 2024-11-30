
@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Daftar Kelas</h1>
        <a href="{{ route('form.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
            Tambah Kelas
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        @if ($kelas->isEmpty())
            <div class="p-6 text-center text-gray-500">
                <p>Belum ada data Kelas.</p>
            </div>
        @else
            <table class="min-w-full table-auto border-collapse">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Nama</th>
                        <th class="px-6 py-3 text-left text-gray-600 font-medium">Mata Pelajaran</th>
                        <th class="px-6 py-3 text-center text-gray-600 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @foreach ($kelas as $k)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-gray-800">{{ $k->nama }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $k->mata_pelajaran }}</td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('edit.guruEdit', $k->id) }}" class="text-yellow-500 hover:text-yellow-600 mr-4">
                                    Edit
                                </a>
                                <form action="{{ route('guru.destroy', $k->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
