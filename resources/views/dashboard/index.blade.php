@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold text-center mb-6">Dashboard Sistem Manajemen Sekolah</h1>
        <p class="text-lg text-center mb-8">Selamat datang di dashboard Sistem Manajemen Sekolah</p>

        <!-- Card untuk tombol navigasi -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-center">Perlu sesuatu?</h2>
            <div class="grid grid-cols-2 gap-6">
                <!-- Button ke Form Input Data -->
                <a href="{{ route('form.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition duration-300 text-center">Form Input Data</a>

                <!-- Button ke List Siswa -->
                <a href="{{ route('siswa.index') }}" class="bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600 transition duration-300 text-center">List Siswa</a>

                <!-- Button ke List Kelas -->
                <a href="{{ route('kelas.index') }}" class="bg-yellow-500 text-white px-6 py-3 rounded-lg shadow hover:bg-yellow-600 transition duration-300 text-center">List Kelas</a>

                <!-- Button ke List Guru -->
                <a href="{{ route('guru.index') }}" class="bg-red-500 text-white px-6 py-3 rounded-lg shadow hover:bg-red-600 transition duration-300 text-center">List Guru</a>
            </div>
        </div>

        <!-- Daftar Kelas dan Data Terkait -->
        <div class="mt-8">
            @foreach($data as $kelas)
                <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4">{{ $kelas->nama_kelas }}</h2>

                    <h3 class="text-xl font-medium mb-2">Siswa:</h3>
                    <ul class="list-disc pl-5 mb-4">
                        @foreach($kelas->siswas as $siswa)
                            <li class="text-gray-800">{{ $siswa->nama }} (NIS: {{ $siswa->nis }})</li>
                        @endforeach
                    </ul>

                    <h3 class="text-xl font-medium mb-2">Guru:</h3>
                    <ul class="list-disc pl-5">
                        @foreach($kelas->gurus as $guru)
                            <li class="text-gray-800">{{ $guru->nama }}</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
@endsection