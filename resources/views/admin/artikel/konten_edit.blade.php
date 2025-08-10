@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Konten Artikel</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.artikel.konten.update', [$artikel->id, $konten->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="judul">Judul Konten</label>
                                <input type="text" name="judul" id="judul"
                                    class="form-control @error('judul') is-invalid @enderror"
                                    value="{{ old('judul', $konten->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi"
                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                    rows="10">{{ old('deskripsi', $konten->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar (Optional)</label>
                                <div class="mb-2">
                                    @if($konten->gambar)
                                        <img src="{{ asset('storage/' . $konten->gambar) }}" alt="Current Image"
                                            style="max-width: 200px; max-height: 200px;" class="img-thumbnail">
                                        <p class="text-muted mt-1">Gambar saat ini</p>
                                    @endif
                                </div>
                                <input type="file" name="gambar" id="gambar"
                                    class="form-control-file @error('gambar') is-invalid @enderror">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Konten
                                </button>
                                <a href="{{ route('admin.artikel.konten', $artikel->id) }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#deskripsi'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection