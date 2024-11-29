@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">


    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-center mb-6">Daftar Siswa</h1>
        <div class="flex justify-between items-center mb-6">

            <a href="{{ route('form.index') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                Tambah murid
            </a>
        </div>

        <!-- List Group untuk Menampilkan Siswa -->
        <div class="bg-white shadow-md rounded-lg">
            <ul class="divide-y divide-gray-200">
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    @if ($siswa->isEmpty())
                        <div class="p-6 text-center text-gray-500">
                            <p>Belum ada data siswa.</p>
                        </div>
                    @else
                        <table class="min-w-full table-auto border-collapse">
                            <thead class="bg-gray-50 border-b">
                                <tr>
                                    <th class="px-6 py-3 text-left text-gray-600 font-medium">Absen</th>
                                    <th class="px-6 py-3 text-left text-gray-600 font-medium">Nama</th>
                                    <th class="px-6 py-3 text-left text-gray-600 font-medium">NIS</th>
                                    <th class="px-6 py-3 text-center text-gray-600 font-medium">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @foreach ($siswa as $s)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 text-gray-800">{{ $s->id }}</td>
                                        <td class="px-6 py-4 text-gray-800">{{ $s->nama }}</td>
                                        <td class="px-6 py-4 text-gray-800">{{ $s->nis }}</td>
                                        <td class="px-6 py-4 text-gray-800">{{ $s->kelas->nama_kelas }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <!-- Formulir untuk Edit -->

                                            
                                                <a href="{{ url('edit/siswa?id=' . $s->id) }}" class="btn btn-warning"> Edit </a>
                                            
                                            
                                            <!-- Formulir untuk Hapus -->
                                            <form action="#" method="POST" class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif

            </ul>
        </div>
    </div>

</html>
@endsection