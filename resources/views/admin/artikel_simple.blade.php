@extends('admin.layouts.app')

@section('title', 'Kelola Artikel - Simplified View')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Kelola Artikel</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Artikel
        </a>
        
        <!-- Search Form -->
        <form action="{{ route('admin.artikel.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari artikel..." 
                   value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- Simple Artikel Display - Only Name and Image -->
    <div class="row">
        @forelse($artikels as $artikel)
            <div class="col-md-4 col-sm-6 col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            @if($artikel->gambar)
                                <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="{{ $artikel->title }}" 
                                     class="img-fluid rounded" style="max-height: 150px; width: auto;">
                            @else
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center" 
                                     style="height: 150px; width: 100%;">
                                    <i class="fas fa-image text-white fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        <h6 class="card-title mb-2">{{ $artikel->title }}</h6>
                        <p class="text-muted small">{{ Str::limit($artikel->excerpt, 50) }}</p>
                        
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.artikel.edit', $artikel) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.artikel.show', $artikel) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                    <h5>Belum ada artikel</h5>
                    <p class="text-muted">Tambahkan artikel baru untuk memulai</p>
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $artikels->links() }}
    </div>
</div>
@endsection
