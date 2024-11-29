<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            text-align: center;
        }
        .btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Dashboard</h1>

    <div class="container">
        <h1>Dashboard</h1>
        <p>Selamat datang di dashboard Anda. Gunakan tombol di bawah ini untuk navigasi ke fitur lainnya:</p>

        <!-- Button ke Form Input Data -->
        <a href="{{ route('form.index') }}" class="btn">Form Input Data</a>

        <!-- Button ke List Siswa -->
        <a href="{{ route('siswa.index') }}" class="btn">List Siswa</a>

        <!-- Button ke List Kelas -->
        <a href="{{ route('kelas.index') }}" class="btn">List Kelas</a>

        <!-- Button ke List Guru -->
        <a href="{{ route('guru.index') }}" class="btn">List Guru</a>
    </div>

    @foreach($data as $kelas)
        <h2>{{ $kelas->nama_kelas }}</h2>

        <h3>Siswa:</h3>
        <ul>
            @foreach($kelas->siswas as $siswa)
                <li>{{ $siswa->nama }}</li>
            @endforeach
        </ul>

        <h3>Guru:</h3>
        <ul>
            @foreach($kelas->gurus as $guru)
                <li>{{ $guru->nama }}</li>
            @endforeach
        </ul>
    @endforeach
</body>
</html>
