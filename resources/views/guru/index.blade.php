@extends('layouts.app')

@section('content')
<h1>Daftar Guru</h1>
<a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah Guru</a>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Mata Pelajaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @if($gurus->isEmpty())
            <p>Data guru tidak ditemukan.</p>
        @else

            @foreach ($gurus as $guru)
                <tr>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->mata_pelajaran }}</td>
                    <td>
                        <a href="{{ route('guru.edit', $guru->id) }}">Edit</a> |
                        <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection