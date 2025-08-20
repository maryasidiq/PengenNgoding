@extends('admin.layouts.app')

@section('title', 'Konten Tips')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Konten Tips: {{ $tip->judul }}</h1>

        <a href="{{ route('admin.tips.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Tips</a>

        <a href="{{ route('admin.tips.konten.create', $tip->id) }}" class="btn btn-success mb-3">Tambah Konten</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Konten</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kontens as $konten)
                    <tr>
                        <td>{{ $konten->id }}</td>
                        <td>{{ $konten->judul ?? '-' }}</td>
                        <td>{!! \Illuminate\Support\Str::limit($konten->deskripsi ?? '', 350) !!}</td>
                        <td class="text-center align-middle">
                            @if(!empty($konten->gambar))
                                <img src="{{ filter_var($konten->gambar, FILTER_VALIDATE_URL) ? $konten->gambar : asset('storage/' . $konten->gambar) }}"
                                    alt="{{ $konten->judul }}" class="img-fluid rounded"
                                    style="max-height: 80px; max-width: 120px; object-fit: contain;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.tips.konten.edit', [$tip->id, $konten->id]) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.tips.konten.destroy', [$tip->id, $konten->id]) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{-- Previous Page Link --}}
                @if ($kontens->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $kontens->previousPageUrl() }}" rel="prev">&laquo;</a>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($kontens->getUrlRange(1, $kontens->lastPage()) as $page => $url)
                    @if ($page == $kontens->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($kontens->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $kontens->nextPageUrl() }}" rel="next">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
@endsection