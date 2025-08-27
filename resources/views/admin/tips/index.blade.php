@extends('admin.layouts.app')

@section('title', 'Kelola Tips')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Kelola Tips</h1>

        <form method="GET" action="{{ route('admin.tips.index') }}" class="mb-3 d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari tips..."
                value="{{ request('search') }}">
            <button type="submit" class="btn btn-outline-primary">Cari</button>
        </form>

        <a href="{{ route('admin.tips.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus me-2"></i>Tambah Tips
        </a>

        <div class="card shadow">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Tips</h5>
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
                            @forelse($tips as $index => $tip)
                                <tr>
                                    <td>{{ $tips->firstItem() + $index }}</td>
                                    <td><a href="{{ route('admin.tips.konten', encrypt($tip->id)) }}"
                                            class="text-blue-600 hover:underline">{{ $tip->nama }}</a></td>
                                    <td>{{ $tip->kategori }}</td>
                                    <td>{{ $tip->judul }}</td>
                                    <td>{!! $tip->short_deskripsi !!}</td>
                                    <td>{!! Str::limit(strip_tags($tip->long_deskripsi), 100) !!}</td>
                                    <td>
                                        @if($tip->gambar)
                                            <img src="{{ filter_var($tip->gambar, FILTER_VALIDATE_URL) ? $tip->gambar : asset('storage/' . $tip->gambar) }}"
                                                alt="{{ $tip->judul }}" width="100">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $tip->updated_at->format('d-m-Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('tips.detail', encrypt($tip->id)) }}" class="btn btn-sm btn-info"
                                                target="_blank" title="Lihat Tips">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.tips.edit', encrypt($tip->id)) }}"
                                                class="btn btn-sm btn-warning" title="Edit Tips">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.tips.destroy', encrypt($tip->id)) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus tips ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus Tips">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Belum ada tips</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{-- Previous Page Link --}}
                        @if ($tips->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $tips->previousPageUrl() }}"
                                    rel="prev">&laquo;</a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($tips->getUrlRange(1, $tips->lastPage()) as $page => $url)
                            @if ($page == $tips->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($tips->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $tips->nextPageUrl() }}" rel="next">&raquo;</a>
                            </li>
                        @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection