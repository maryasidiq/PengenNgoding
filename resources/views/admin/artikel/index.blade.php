@extends('admin.layouts.app')

@section('title', 'Kelola Artikel')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Kelola Artikel</h1>

        <form method="GET" action="{{ route('admin.artikel.index') }}" class="mb-3 d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari artikel..."
                value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </form>

        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus me-2"></i>Tambah Artikel
        </a>

        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Artikel</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Short Deskripsi</th>
                                <th>Long Deskripsi</th>
                                <th>Gambar</th>
                                <th>Update</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($artikels as $index => $artikel)
                                <tr>
                                    <td>{{ $artikels->firstItem() + $index }}</td>
                                    <td><a href="{{ route('admin.artikel.konten', $artikel->id) }}"
                                            class="text-blue-600 hover:underline">{{ $artikel->nama }}</a></td>
                                    <td>{{ $artikel->kategori }}</td>
                                    <td>{{ $artikel->judul }}</td>
                                    <td>{{ $artikel->short_deskripsi }}</td>
                                    <td>{!! Str::limit(strip_tags($artikel->long_deskripsi), 100) !!}</td>
                                    <td>
                                        @if($artikel->gambar)
                                            <img src="{{ filter_var($artikel->gambar, FILTER_VALIDATE_URL) ? $artikel->gambar : asset('storage/' . $artikel->gambar) }}"
                                                alt="{{ $artikel->judul }} " width="100">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $artikel->updated_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.artikel.edit', $artikel) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Belum ada artikel</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($artikels->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $artikels->previousPageUrl() }}"
                                    rel="prev">&laquo;</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
                            @if ($page == $artikels->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($artikels->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $artikels->nextPageUrl() }}"
                                    rel="next">&raquo;</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    </div>
@endsection