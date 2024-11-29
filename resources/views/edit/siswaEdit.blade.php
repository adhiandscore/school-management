@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-center mb-6">Edit Siswa</h1>

        <form action="{{ route('edit.siswaEdit', $siswa->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-bold mb-2">Nama Siswa:</label>
                <input type="text" name="nama" id="nama" value="{{ $s->nama }}" 
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="nis" class="block text-gray-700 font-bold mb-2">Nomor Induk Siswa (NIS):</label>
                <input type="text" name="nis" id="nis" value="{{ $s->nis }}" 
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="kelas_id" class="block text-gray-700 font-bold mb-2">Kelas:</label>
                <select name="kelas_id" id="kelas_id" 
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @foreach($kelas as $kls)
                        <option value="{{ $kls->id }}" {{ $s->kelas_id == $kls->id ? 'selected' : '' }}>
                            {{ $kls->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
      

    </div>

</body>
</html>


@endsection