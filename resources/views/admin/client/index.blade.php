@extends('admin.layouts.app')

@section('title', 'Kelola Client')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Kelola Client</h1>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('admin.client.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Client
            </a>

            <!-- Search Form -->
            <form action="{{ route('admin.client.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari client..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <!-- Simple Client Display - Only Name and Image -->
        <div class="row">
            @forelse($clients as $client)
                <div class="col-md-3 col-sm-4 col-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                @if($client->gambar)
                                    <img src="{{ asset('storage/' . $client->gambar) }}" alt="{{ $client->nama }}"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <span class="text-muted">No Logo</span>
                                @endif
                            </div>
                            <h6 class="card-title mb-1">{{ $client->nama }}</h6>

                            <!-- Action Buttons -->
                            <div class="btn-group btn-group-sm mt-2">
                                <a href="{{ route('admin.client.edit', encrypt($client->id)) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.client.destroy', encrypt($client->id)) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus client ini?')">
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
                        <i class="fas fa-users fa-3x text-muted mb-3"></i>
                        <h5>Belum ada client</h5>
                        <p class="text-muted">Tambahkan client baru untuk memulai</p>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $clients->links() }}
        </div>
    </div>
@endsection