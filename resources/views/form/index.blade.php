@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-6">Form Input</h1>

        <!-- Form Tambah Siswa -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Tambah Siswa</h2>
            <form action="{{ route('form.siswa.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nama Siswa:</label>
                        <input type="text" name="nama"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nomor Induk Siswa:</label>
                        <input type="number" name="nis" placeholder="Nomor induk siswa"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Kelas:</label>
                        <select name="kelas_id"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required>
                            @foreach($kelas as $kls)
                                <option value="{{ $kls->id }}">{{ $kls->nama_kelas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="w-full bg-indigo-500 text-white font-semibold py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">Tambah
                        Siswa</button>
                </div>
            </form>
        </div>

        <!-- Form Tambah Kelas -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Tambah Kelas</h2>
            <form action="{{ route('form.kelas.store') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nama Kelas:</label>
                    <input type="text" name="nama_kelas"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>
                <button type="submit"
                    class="w-full bg-indigo-500 text-white font-semibold py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 mt-4">Tambah
                    Kelas</button>
            </form>
        </div>

        <!-- Form Tambah Guru -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Tambah Guru</h2>
            <form action="{{ route('form.guru.store') }}" method="POST">
                @csrf
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nama Guru:</label>
                    <input type="text" name="nama"
                        class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">kelas yang diampu:</label>
                    <select name="kelas_id"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            required>
                            @foreach($kelas as $kls)
                                <option value="{{ $kls->id }}">{{ $kls->nama_kelas}}</option>
                            @endforeach
                        </select>
                </div>
                <button type="submit"
                    class="w-full bg-indigo-500 text-white font-semibold py-2 rounded-lg hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 mt-4">Tambah
                    Guru</button>
            </form>
        </div>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mt-4">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif
    </div>
</body>

</html>
@endsection