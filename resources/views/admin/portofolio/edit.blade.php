@extends('admin.layouts.app')

@section('title', 'Edit Portofolio')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Edit Portofolio</h1>

        <form action="{{ route('admin.portofolio.update', $portofolio) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul"
                    value="{{ old('judul', $portofolio->judul) }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"
                    required>{{ old('deskripsi', $portofolio->deskripsi) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori"
                    value="{{ old('kategori', $portofolio->kategori) }}" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                @if($portofolio->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $portofolio->gambar) }}" alt="{{ $portofolio->judul }}"
                            style="width: 150px; height: auto;">
                    </div>
                @endif
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="screenshots" class="form-label">Screenshot</label>
                <input type="file" class="form-control" id="screenshots" name="screenshots[]" accept="image/*" multiple>
                <div class="mt-2 d-flex flex-wrap gap-2">
                    @foreach($portofolio->screenshots as $screenshot)
                        <div class="position-relative" style="display: inline-block;">
                            <img src="{{ asset('storage/' . $screenshot->screenshot) }}" alt="Screenshot"
                                style="width: 100px; height: 100px; object-fit: cover; border-radius: 6px;">
                            <div style="position: absolute; top: 2px; right: 2px;">
                                <input type="checkbox" name="delete_screenshots[]" value="{{ $screenshot->id }}"
                                    title="Hapus screenshot ini">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="url" class="form-control" id="link" name="link" value="{{ old('link', $portofolio->link) }}">
            </div>

            <div class="mb-3">
                <label for="dibuat_pada" class="form-label">Tanggal Dibuat</label>
                <input type="date" class="form-control" id="dibuat_pada" name="dibuat_pada"
                    value="{{ old('dibuat_pada', $portofolio->dibuat_pada ? \Carbon\Carbon::parse($portofolio->dibuat_pada)->format('Y-m-d') : '') }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Update Portofolio</button>
            <a href="{{ route('admin.portofolio.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection