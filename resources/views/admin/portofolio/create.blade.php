@extends('admin.layouts.app')

@section('title', 'Tambah Portofolio')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3">Tambah Portofolio Baru</h1>
                    <a href="{{ route('admin.portofolio.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Kembali
                    </a>
                </div>

                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Form Tambah Portofolio</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.portofolio.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Judul Project *</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="client_name" class="form-label">Nama Client *</label>
                                        <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                            id="client_name" name="client_name" value="{{ old('client_name') }}" required>
                                        @error('client_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Kategori *</label>
                                        <input type="text" class="form-control @error('category') is-invalid @enderror"
                                            id="category" name="category" value="{{ old('category') }}" required>
                                        @error('category')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="project_date" class="form-label">Tanggal Project *</label>
                                        <input type="date" class="form-control @error('project_date') is-invalid @enderror"
                                            id="project_date" name="project_date" value="{{ old('project_date') }}"
                                            required>
                                        @error('project_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="technologies" class="form-label">Teknologi yang Digunakan *</label>
                                <input type="text" class="form-control @error('technologies') is-invalid @enderror"
                                    id="technologies" name="technologies" value="{{ old('technologies') }}"
                                    placeholder="Contoh: Laravel, Vue.js, MySQL" required>
                                @error('technologies')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Project *</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="4" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="project_url" class="form-label">URL Project</label>
                                <input type="url" class="form-control @error('project_url') is-invalid @enderror"
                                    id="project_url" name="project_url" value="{{ old('project_url') }}"
                                    placeholder="https://example.com">
                                @error('project_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="thumbnail" class="form-label">Thumbnail *</label>
                                        <input type="file" class="form-control @error('thumbnail') is-invalid @enderror"
                                            id="thumbnail" name="thumbnail" accept="image/*" required>
                                        @error('thumbnail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="screenshots" class="form-label">Screenshots</label>
                                        <input type="file" class="form-control @error('screenshots') is-invalid @enderror"
                                            id="screenshots" name="screenshots[]" accept="image/*" multiple>
                                        @error('screenshots')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">Bisa pilih multiple file. Max: 2MB per file</small>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Simpan Portofolio
                                </button>
                                <a href="{{ route('admin.portofolio.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Preview thumbnail
        document.getElementById('thumbnail').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    // Add preview functionality here
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush