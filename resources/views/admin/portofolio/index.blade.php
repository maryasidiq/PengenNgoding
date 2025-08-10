@extends('admin.layouts.app')

@section('title', 'Kelola Portofolio')

@section('content')
<div class="container-fluid">
    <form method="GET" action="{{ route('admin.portofolio.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari portofolio..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </form>
    @foreach($portofolios as $index => $portofolio)
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">No {{ $index + 1 }}</h5>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Thumbnail</div>
                <div class="col-md-9">
                    : 
                    @if($portofolio->gambar)
                        <img src="{{ asset( 'storage/' . $portofolio->gambar) }}" alt="{{ $portofolio->judul }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 6px;">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Judul</div>
                <div class="col-md-9">: {{ $portofolio->judul }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Client</div>
                <div class="col-md-9">: -</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Kategori</div>
                <div class="col-md-9">: {{ $portofolio->kategori }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Teknologi yang Digunakan</div>
                <div class="col-md-9">: {{ $portofolio->teknologi ?? '-' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 fw-bold">Tanggal</div>
                <div class="col-md-9">: {{ $portofolio->dibuat_pada ? \Carbon\Carbon::parse($portofolio->dibuat_pada)->format('d/m/Y') : '-' }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Link</div>
                <div class="col-md-9">
                    : 
                    @if($portofolio->link)
                        <a href="{{ $portofolio->link }}" target="_blank">{{ $portofolio->link }}</a>
                    @else
                        -
                    @endif
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Deskripsi</div>
                <div class="col-md-9">: {!! nl2br(e($portofolio->deskripsi)) !!}</div>
            </div>
             
            <div class="row mb-2">
                <div class="col-md-3 fw-bold">Screenshot</div>
                <div class="col-md-9 d-flex flex-wrap gap-2">
                    @foreach($portofolio->screenshots as $screenshot)
                        <img src="{{ asset( 'storage/' . $screenshot->screenshot) }}" alt="Screenshot" style="width: 100px; height: 100px; object-fit: cover; border-radius: 6px;">
                    @endforeach
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.portofolio.edit', $portofolio) }}" class="btn btn-warning me-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.portofolio.destroy', $portofolio) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus portofolio ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {{ $portofolios->links() }}
    </div>
</div>
@endsection
