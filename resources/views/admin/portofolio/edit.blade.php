@extends('admin.layouts.app')

@section('title', 'Edit Portofolio')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Edit Portofolio</h1>

        <form action="{{ route('admin.portofolio.update', encrypt($portofolio->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul"
                    value="{{ old('judul', $portofolio->judul) }}" required>
            </div>

             <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi',$portofolio->deskripsi) }}">
                <trix-editor input="deskripsi" class="form-control"></trix-editor>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    @foreach(App\Helpers\CategoryHelper::getAllCategories() as $category)
                        <option value="{{ $category }}" {{ (old('kategori', $portofolio->kategori) == $category) ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
                <div class="form-text">
                    Atau <a href="{{ route('admin.kategori.create') }}" target="_blank">buat kategori baru</a>
                </div>
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