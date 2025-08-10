@extends('admin.layouts.app')

@section('title', 'Kelola Video')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Kelola Video</h1>

        <form method="GET" action="{{ route('admin.video.index') }}" class="mb-3 d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari video..."
                value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </form>

        <a href="{{ route('admin.video.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus me-2"></i>Tambah Video
        </a>

        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Video</h5>
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
                            @forelse($videos as $index => $video)
                                <tr>
                                    <td>{{ $videos->firstItem() + $index }}</td>
                                    <td><a href="{{ route('admin.video.konten', $video) }}"
                                            class="text-blue-600 hover:underline">{{ $video->nama }}</a></td>
                                    <td>{{ $video->kategori }}</td>
                                    <td>{{ $video->judul }}</td>
                                    <td>{{ $video->short_deskripsi }}</td>
                                    <td>{!! Str::limit(strip_tags($video->long_deskripsi), 100) !!}</td>
                                    <td>
                                        @if($video->gambar)
                                            <img src="{{ asset('storage/' . $video->gambar) }}" alt="{{ $video->judul }}"
                                                width="100">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $video->updated_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.video.edit', $video) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.video.destroy', $video) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus video ini?')">
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
                                    <td colspan="9" class="text-center">Belum ada video</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($videos->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $videos->previousPageUrl() }}"
                                    rel="prev">&laquo;</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($videos->getUrlRange(1, $videos->lastPage()) as $page => $url)
                            @if ($page == $videos->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($videos->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $videos->nextPageUrl() }}"
                                    rel="next">&raquo;</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection