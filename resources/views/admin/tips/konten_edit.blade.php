@extends('admin.layouts.app')

@section('title', 'Edit Konten Tips')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Edit Konten Tips: {{ $tip->judul }}</h1>

        <a href="{{ route('admin.tips.konten', encrypt($tip->id)) }}" class="btn btn-secondary mb-3">Kembali ke Daftar
            Konten</a>

        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Form Edit Konten</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tips.konten.update', [encrypt($tip->id), encrypt($konten->id)]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Konten</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                            value="{{ old('judul', $konten->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input id="deskripsi" type="hidden" name="deskripsi"
                            value="{{ old('deskripsi', $konten->deskripsi) }}">
                        <trix-editor input="deskripsi" class="form-control"></trix-editor>
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

                        @if($konten->gambar)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $konten->gambar) }}" alt="{{ $konten->judul }}" width="100">
                                <p class="text-muted mt-1">Gambar saat ini</p>
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update Konten</button>
                    <a href="{{ route('admin.tips.konten', encrypt($tip->id)) }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection