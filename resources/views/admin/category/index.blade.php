@extends('admin.layouts.app')

@section('title', 'Kelola Kategori')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Kelola Kategori</h1>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-warning ">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ count($allCategories) }}</h5>
                        <p class="card-text">Total Kategori</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ array_sum($categoryCounts) }}</h5>
                        <p class="card-text">Total Item</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">

            <a href="{{ route('admin.kategori.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Kategori
            </a>
            <form method="GET" action="{{ route('admin.kategori.index') }}" class="d-flex me-3">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari kategori..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Cari</button>
                @if(request('search'))
                    <a href="{{ route('admin.kategori.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
                @endif
            </form>

        </div>

        @if(session('temp_categories'))
            <div class="alert alert-info mb-3">
                <i class="fas fa-info-circle me-2"></i>
                <strong>Informasi:</strong> Kategori dengan badge <span class="badge bg-warning">Sementara</span>
                akan tersimpan permanen saat digunakan pada item (artikel, tips, video, atau portofolio).
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Kategori</h5>
            </div>
            <div class="card-body">
                @if($allCategories->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Jumlah Item</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allCategories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $category }}</strong>
                                        </td>
                                        <td>
                                            @if($categoryCounts[$category] ?? 0 > 0)
                                                <span class="badge bg-info">{{ $categoryCounts[$category] }} item</span>
                                            @else
                                                <span class="badge bg-warning">Sementara</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.kategori.show', encrypt($category)) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.kategori.edit', encrypt($category)) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.kategori.destroy', encrypt($category)) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini dari semua item?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-tags fa-3x text-muted mb-3"></i>
                        <p class="text-muted">Belum ada kategori yang tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection