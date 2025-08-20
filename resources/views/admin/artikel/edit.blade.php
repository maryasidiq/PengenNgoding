@extends('admin.layouts.app')

@section('title', 'Edit Artikel')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Edit Artikel</h1>

        <form action="{{ route('admin.artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $artikel->nama) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $artikel->judul) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="short_deskripsi" class="form-label">Short Deskripsi</label>
                <input id="short_deskripsi" type="hidden" name="short_deskripsi"
                    value="{{ old('short_deskripsi', $artikel->short_deskripsi) }}">
                <trix-editor input="short_deskripsi" class="form-control"></trix-editor>
            </div>

            <div class="mb-3">
                <label for="long_deskripsi" class="form-label">Long Deskripsi</label>
                <input id="long_deskripsi" type="hidden" name="long_deskripsi"
                    value="{{ old('long_deskripsi', $artikel->long_deskripsi) }}">
                <trix-editor input="long_deskripsi" class="form-control"></trix-editor>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" name="kategori" id="kategori" class="form-control"
                    value="{{ old('kategori', $artikel->kategori) }}" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                @if($artikel->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" width="150">
                    </div>
                @endif
                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection