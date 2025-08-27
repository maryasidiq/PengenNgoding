@extends('admin.layouts.app')

@section('title', 'Tambah Konten Tips')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Tambah Konten Tips: {{ $tip->judul }}</h1>

        <a href="{{ route('admin.tips.konten', encrypt($tip->id)) }}" class="btn btn-secondary mb-3">Kembali ke Daftar
            Konten</a>

        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Form Tambah Konten</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tips.konten.store', encrypt($tip->id)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Konten</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                            value="{{ old('judul') }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
                        <trix-editor input="deskripsi"
                            class="form-control @error('deskripsi') is-invalid @enderror"></trix-editor>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                            name="gambar" accept="image/*">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Konten</button>
                    <a href="{{ route('admin.tips.konten', encrypt($tip->id)) }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection