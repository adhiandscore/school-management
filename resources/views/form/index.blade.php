<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input</title>
</head>
<body>
    <h1>Form Input</h1>

    <!-- Form Tambah Siswa -->
    <h2>Tambah Siswa</h2>
    <form action="{{ route('form.siswa.store') }}" method="POST">
        @csrf
        <label>Nama Siswa:</label>
        <input type="text" name="nama" required>
        <label>Kelas:</label>
        <select name="kelas_id" required>
            @foreach($kelas as $kls)
                <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
            @endforeach
        </select>
        <button type="submit">Tambah Siswa</button>
    </form>

    <!-- Form Tambah Kelas -->
    <h2>Tambah Kelas</h2>
    <form action="{{ route('form.kelas.store') }}" method="POST">
        @csrf
        <label>Nama Kelas:</label>
        <input type="text" name="nama_kelas" required>
        <button type="submit">Tambah Kelas</button>
    </form>

    <!-- Form Tambah Guru -->
    <h2>Tambah Guru</h2>
    <form action="{{ route('form.guru.store') }}" method="POST">
        @csrf
        <label>Nama Guru:</label>
        <input type="text" name="nama" required>
        <button type="submit">Tambah Guru</button>
    </form>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
</body>
</html>
