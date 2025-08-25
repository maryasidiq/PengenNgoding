@extends('admin.layouts.app')

@section('title', 'Edit Kategori - ' . $category)

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Edit Kategori: {{ $category }}</h1>
            <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>Kembali
            </a>
        </div>

        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Form Edit Kategori</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.kategori.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="new_category" class="form-label">Nama Kategori Baru</label>
                        <input type="text" class="form-control @error('new_category') is-invalid @enderror"
                            id="new_category" name="new_category" value="{{ old('new_category', $category) }}" required
                            maxlength="100">
                        @error('new_category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Ubah nama kategori ini. Perubahan akan diterapkan ke semua item yang
                            menggunakan kategori "{{ $category }}".</div>
                    </div>

                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Peringatan:</strong> Mengubah nama kategori akan mempengaruhi semua item yang menggunakan
                        kategori ini di:
                        <ul class="mb-0 mt-2">
                            <li>Artikel</li>
                            <li>Tips</li>
                            <li>Video</li>
                            <li>Portofolio</li>
                        </ul>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>

        <div class="card shadow mt-4">
            <div class="card-header bg-danger text-white">
                <h5 class="card-title mb-0">Hapus Kategori</h5>
            </div>
            <div class="card-body">
                <p class="text-muted">Menghapus kategori akan menghapus kategori dari semua item yang menggunakannya.</p>
                <form action="{{ route('admin.kategori.destroy', $category) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini dari semua item?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i>Hapus Kategori
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection