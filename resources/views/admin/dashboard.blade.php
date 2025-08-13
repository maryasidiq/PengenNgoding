@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4">Dashboard Admin</h1>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Portofolio</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPortofolio }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Client</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalClient }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Total Artikel</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalArtikel }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Total Tips</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTips }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-lightbulb fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Total Video</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalVideo }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-video fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Quick Actions</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('admin.portofolio.create') }}" class="btn btn-primary btn-lg w-100">
                                    <i class="fas fa-plus me-2"></i>Tambah Portofolio
                                </a>
                            </div>
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('admin.client.create') }}" class="btn btn-success btn-lg w-100">
                                    <i class="fas fa-plus me-2"></i>Tambah Client
                                </a>
                            </div>
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('admin.artikel.create') }}" class="btn btn-info btn-lg w-100">
                                    <i class="fas fa-plus me-2"></i>Tambah Artikel
                                </a>
                            </div>
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('admin.tips.create') }}" class="btn btn-warning btn-lg w-100">
                                    <i class="fas fa-plus me-2"></i>Tambah Tips
                                </a>
                            </div>
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('admin.video.create') }}" class="btn btn-danger btn-lg w-100">
                                    <i class="fas fa-plus me-2"></i>Tambah Video
                                </a>
                            </div>
                            <div class="col-md-4 mb-3">
                                <a href="{{ route('beranda') }}" class="btn btn-secondary btn-lg w-100">
                                    <i class="fas fa-home me-2"></i>Kembali ke Website
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <!-- <div class="row mt-4">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Aktivitas Terbaru</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Fitur aktivitas terbaru akan segera tersedia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Statistik Bulanan</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Fitur statistik bulanan akan segera tersedia.</p>
                        </div>
                    </div>
                </div>
            </div> -->
    </div>
@endsection