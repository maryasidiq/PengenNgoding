@extends('admin.layouts.app')

@section('title', 'Detail Kategori - ' . $category)

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Detail Kategori: {{ $category }}</h1>
            <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>Kembali
            </a>
        </div>

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $artikelItems->count() }}</h5>
                        <p class="card-text">Artikel</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $tipsItems->count() }}</h5>
                        <p class="card-text">Tips</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info text-white">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $videoItems->count() }}</h5>
                        <p class="card-text">Video</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-dark">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $portofolioItems->count() }}</h5>
                        <p class="card-text">Portofolio</p>
                    </div>
                </div>
            </div>
        </div>

        @if($artikelItems->count() > 0)
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Artikel ({{ $artikelItems->count() }})</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Nama</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($artikelItems as $index => $artikel)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $artikel->judul }}</td>
                                        <td>{{ $artikel->nama }}</td>
                                        <td>{{ $artikel->updated_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if($tipsItems->count() > 0)
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Tips ({{ $tipsItems->count() }})</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Nama</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipsItems as $index => $tip)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $tip->judul }}</td>
                                        <td>{{ $tip->nama }}</td>
                                        <td>{{ $tip->updated_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if($videoItems->count() > 0)
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Video ({{ $videoItems->count() }})</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Nama</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($videoItems as $index => $video)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $video->judul }}</td>
                                        <td>{{ $video->nama }}</td>
                                        <td>{{ $video->updated_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if($portofolioItems->count() > 0)
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Portofolio ({{ $portofolioItems->count() }})</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($portofolioItems as $index => $portofolio)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $portofolio->nama }}</td>
                                        <td>{{ $portofolio->judul }}</td>
                                        <td>{{ $portofolio->updated_at->format('d-m-Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        @if($artikelItems->count() == 0 && $tipsItems->count() == 0 && $videoItems->count() == 0 && $portofolioItems->count() == 0)
            <div class="card shadow">
                <div class="card-body text-center py-5">
                    @if($isTemporary)
                        <i class="fas fa-clock fa-3x text-warning mb-3"></i>
                        <h5 class="text-warning">Kategori Sementara</h5>
                        <p class="text-muted">Kategori "{{ $category }}" disimpan sementara dan akan tersimpan permanen saat
                            digunakan pada item.</p>
                        <div class="alert alert-info mt-3">
                            <i class="fas fa-info-circle me-2"></i>
                            Gunakan kategori ini pada item (artikel, tips, video, atau portofolio) untuk menyimpannya secara
                            permanen.
                        </div>
                    @else
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Tidak ada item dalam kategori ini</h5>
                        <p class="text-muted">Kategori "{{ $category }}" belum digunakan oleh item apapun.</p>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection