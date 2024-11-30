@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4">Daftar Guru</h1>

            <!-- Tampilkan pesan sukses -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabel Data Guru -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kelas yang Diampu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gurus as $guru)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $guru->nama??'' }}</td>
                            <td>
                                @if($guru->kelases->isNotEmpty())
                                    @foreach($guru->kelases as $kelas)
                                        {{ $kelas->nama ??''}}@if(!$loop->last), @endif
                                    @endforeach
                                @else
                                    <em>Belum mengampu kelas</em>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data guru.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Tombol Tambah Guru -->
            <a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah Guru</a>
        </div>
    </div>
</div>
@endsection
