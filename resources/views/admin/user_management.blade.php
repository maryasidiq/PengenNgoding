@extends('admin.layouts.app')

@section('title', 'Edit Profil')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4 text-gray-800">Edit Profil Pengguna</h1>
            </div>
        </div>

        <!-- @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif -->

        <div class="row">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Informasi Profil</h6>
                    </div>
                    <div class="card-body">
                        <!-- Tambahkan onsubmit -->
                        <form action="{{ route('admin.user_management.update') }}" method="POST"
                            onsubmit="return confirmSave()">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                                <small class="form-text text-muted">Email tidak dapat diubah</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password Baru (opsional)</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah
                                    password</small>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script konfirmasi -->
    <script>
        function confirmSave() {
            return confirm("Apakah Anda yakin ingin menyimpan perubahan profil?");
        }
    </script>
@endsection