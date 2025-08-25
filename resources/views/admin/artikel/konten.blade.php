@extends('admin.layouts.app')

@section('title', 'Konten Artikel')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4">Konten Artikel: {{ $artikel->judul }}</h1>

        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Artikel</a>

        <a href="{{ route('admin.artikel.konten.create', $artikel->id) }}" class="btn btn-success mb-3">Tambah Konten</a>

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
                        <td>{!! \Illuminate\Support\Str::limit($konten->deskripsi ?? '', 500) !!}</td>
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
                            <div class="btn-group" role="group">
                                <a href="{{ route('artikel.bab', ['id' => $artikel->id, 'bab_id' => $konten->id]) }}"
                                    class="btn btn-sm btn-info" target="_blank" title="Lihat Konten">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.artikel.konten.edit', [$artikel->id, $konten->id]) }}"
                                    class="btn btn-sm btn-warning" title="Edit Konten">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.artikel.konten.destroy', [$artikel->id, $konten->id]) }}"
                                    method="POST" class="d-inline"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus konten ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus Konten">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
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