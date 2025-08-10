@extends('admin.layouts.app')

@section('title', 'Edit Konten Tips')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Edit Konten Tips: {{ $tip->judul }}</h1>

        <a href="{{ route('admin.tips.konten', $tip->id) }}" class="btn btn-secondary mb-3">Kembali ke Daftar
            Konten</a>

        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Form Edit Konten</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.tips.konten.update', [$tip->id, $konten->id]) }}" method="POST"
                    enctype="multipart/form-data">
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

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                            name="deskripsi" rows="5">{{ old('deskripsi', $konten->deskripsi) }}</textarea>
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
                    <a href="{{ route('admin.tips.konten', $tip->id) }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection