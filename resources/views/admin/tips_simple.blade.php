@extends('admin.layouts.app')

@section('title', 'Kelola Tips - Simplified View')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4">Kelola Tips</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('admin.tips.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Tambah Tips
        </a>
        
        <!-- Search Form -->
        <form action="{{ route('admin.tips.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari tips..." 
                   value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- Simple Tips Display - Only Name and Image -->
    <div class="row">
        @forelse($tips as $tip)
            <div class="col-md-4 col-sm-6 col-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            @if($tip->gambar)
                                <img src="{{ asset('storage/' . $tip->gambar) }}" alt="{{ $tip->title }}" 
                                     class="img-fluid rounded" style="max-height: 150px; width: auto;">
                            @else
                                <div class="bg-secondary rounded d-flex align-items-center justify-content-center" 
                                     style="height: 150px; width: 100%;">
                                    <i class="fas fa-lightbulb text-white fa-3x"></i>
                                </div>
                            @endif
                        </div>
                        <h6 class="card-title mb-2">{{ $tip->title }}</h6>
                        <p class="text-muted small">{{ Str::limit($tip->excerpt, 50) }}</p>
                        
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('admin.tips.edit', $tip) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.tips.show', $tip) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.tips.destroy', $tip) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus tips ini?')">
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
                    <i class="fas fa-lightbulb fa-3x text-muted mb-3"></i>
                    <h5>Belum ada tips</h5>
                    <p class="text-muted">Tambahkan tips baru untuk memulai</p>
                </div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $tips->links() }}
    </div>
</div>
@endsection
