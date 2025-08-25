@extends('admin.layouts.app')

@section('title', 'Kelola Testimoni')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Kelola Testimoni</h1>
            <a href="{{ route('admin.testimoni.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Testimoni
            </a>
        </div>

        <!-- Search Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('admin.testimoni.index') }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari testimoni..."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        @if(request('search'))
                            <a href="{{ route('admin.testimoni.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Reset
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Testimoni Table -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Instansi</th>
                                <th>Pesan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($testimonis as $testimoni)
                                <tr>
                                    <td>{{ $testimoni->id }}</td>
                                    <td>{{ $testimoni->nama }}</td>
                                    <td>{{ $testimoni->jabatan ?? '-' }}</td>
                                    <td>{{ $testimoni->instansi ?? '-' }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($testimoni->pesan, 700) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.testimoni.edit', $testimoni) }}"
                                                class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.testimoni.destroy', $testimoni->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada testimoni ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $testimonis->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection