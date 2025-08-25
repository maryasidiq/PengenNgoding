@extends('admin.layouts.app')

@section('title', 'Tambah Kategori Baru')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Tambah Kategori Baru</h1>
            <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>Kembali
            </a>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Form Tambah Kategori</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.kategori.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="new_category" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control @error('new_category') is-invalid @enderror"
                            id="new_category" name="new_category" value="{{ old('new_category') }}" required maxlength="100"
                            placeholder="Masukkan nama kategori">
                        @error('new_category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Masukkan nama kategori baru yang ingin ditambahkan.</div>
                    </div>

                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Informasi:</strong> Kategori akan tersimpan otomatis saat digunakan pada:
                        <ul class="mb-0 mt-2">
                            <li>Artikel</li>
                            <li>Tips</li>
                            <li>Video</li>
                            <li>Portofolio</li>
                        </ul>
                        <p class="mb-0 mt-2"><small>Kategori tidak disimpan di tabel terpisah, melainkan langsung di
                                masing-masing item.</small></p>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i></i>Simpan
                    </button>
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection