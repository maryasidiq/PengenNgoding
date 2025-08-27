@extends('admin.layouts.app')

@section('title', 'Edit Client')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Edit Client</h1>

        <form action="{{ route('admin.client.update', encrypt($client->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Client</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama', $client->nama) }}" required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Logo Client</label>
                @if($client->gambar)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $client->gambar) }}" alt="{{ $client->nama }}"
                            style="max-height: 150px;">
                    </div>
                @endif
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar"
                    accept="image/*">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.client.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection