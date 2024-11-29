<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
</head>
<body>
    <h1>Daftar Siswa</h1>

    <ul>
        @foreach ($siswa as $s)
            <li>{{ $s->nama }}</li>
        @endforeach
    </ul>
</body>
</html>