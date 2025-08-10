@extends('admin.layouts.app')

@section('title', 'Tambah Client')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Tambah Client</h1>

        <form action="{{ route('admin.client.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Client</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Logo Client</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar"
                    accept="image/*">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.client.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection