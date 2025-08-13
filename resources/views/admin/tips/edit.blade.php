@extends('admin.layouts.app')

@section('title', 'Edit Tips')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Edit Tips</h1>

        <form action="{{ route('admin.tips.update', $tips) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $tips->nama) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $tips->judul) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="short_deskripsi" class="form-label">Short Deskripsi</label>
                <textarea name="short_deskripsi" id="short_deskripsi" class="form-control" rows="3"
                    required>{{ old('short_deskripsi', $tips->short_deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="long_deskripsi" class="form-label">Long Deskripsi</label>
                <textarea name="long_deskripsi" id="long_deskripsi" class="form-control" rows="6"
                    required>{{ old('long_deskripsi', $tips->long_deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" name="kategori" id="kategori" class="form-control"
                    value="{{ old('kategori', $tips->kategori) }}" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                @if($tips->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $tips->gambar) }}" alt="{{ $tips->judul }}" width="150">
                    </div>
                @endif
                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.tips.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection