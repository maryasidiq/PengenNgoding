@extends('admin.layouts.app')

@section('title', 'Edit Video')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Edit Video</h1>

        <form action="{{ route('admin.video.update', encrypt($video->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $video->nama) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $video->judul) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="short_deskripsi" class="form-label">Short Deskripsi</label>
                <input id="short_deskripsi" type="hidden" name="short_deskripsi"
                    value="{{ old('short_deskripsi', $video->short_deskripsi) }}">
                <trix-editor input="short_deskripsi" class="form-control"></trix-editor>
            </div>

            <div class="mb-3">
                <label for="long_deskripsi" class="form-label">Long Deskripsi</label>
                <input id="long_deskripsi" type="hidden" name="long_deskripsi"
                    value="{{ old('long_deskripsi', $video->long_deskripsi) }}">
                <trix-editor input="long_deskripsi" class="form-control"></trix-editor>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-control" required>
                    <option value="">Pilih Kategori</option>
                    @foreach(App\Helpers\CategoryHelper::getAllCategories() as $category)
                        <option value="{{ $category }}" {{ (old('kategori', $video->kategori) == $category) ? 'selected' : '' }}>
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
                @if($video->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $video->gambar) }}" alt="{{ $video->judul }}" width="150">
                    </div>
                @endif
                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.video.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection