@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Siswa</h1>
    @foreach($kelas as $k)
    <form action="{{ route('siswa.update', $k->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ $siswa->nama }}" required>
        </div>

        <!-- Kelas -->
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ $siswa->kelas }}" required>
        </div>

        <!-- Alamat -->
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control">{{ $siswa->alamat }}</textarea>
        </div>

        <!-- Tombol -->
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
    @endforeach
</div>
@endsection
