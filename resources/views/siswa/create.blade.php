@extends('layouts.app')

@section('content')

<form action="{{ route('siswa.store') }}" method="POST">
    @csrf
    <div>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
    </div>
    <div>
        <label for="nis">NIS:</label>
        <input type="text" name="nis" id="nis" value="{{ old('nis') }}" required>
    </div>
    <div>
        <label for="kelas_id">Kelas:</label>
        <select name="kelas_id" id="kelas_id">
            <option value="">Pilih Kelas</option>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit">Simpan</button>
</form>
@endsection