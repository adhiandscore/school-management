@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center px-6 my-12">
        <div class="w-full xl:w-3/4 lg:w-11/12 flex flex-col">
            <div class="overflow-hidden rounded shadow-lg">
                <div class="bg-white px-6 py-4">
                    <h3 class="text-gray-700 text-3xl font-medium">Edit Guru</h3>
                </div>
                <div class="bg-white px-6 pb-8">
                    <form method="POST" action="{{ route('guru.update', $guru->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                                Nama
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" type="text" name="nama" value="{{ old('nama', $guru->nama) }}" required>
                            @error('nama')
                                <span class="text-red-500 text-sm" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="kelases">
                                Kelas yang Diajar
                            </label>
                            <select name="kelases" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple>
                                @foreach ($guru->kelases as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-center">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection