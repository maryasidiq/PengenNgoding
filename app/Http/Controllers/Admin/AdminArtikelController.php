<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\artikelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Helpers\CategoryHelper;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class AdminArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = artikelModel::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('judul', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");
        }

        $artikels = $query->latest()->paginate(10)->withQueryString();

        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|unique:artikel,judul|max:255',
            'short_deskripsi' => 'required|string|max:500',
            'long_deskripsi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('artikels/featured_images', 'public');
            $validated['gambar'] = $imagePath;
        }

        artikelModel::create($validated);

        // Hapus kategori dari session jika ada (karena sudah digunakan)
        CategoryHelper::removeFromSession($validated['kategori']);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $artikel = artikelModel::findOrFail($id);
            return view('admin.artikel.edit', compact('artikel'));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function update(Request $request, $encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $artikel = artikelModel::findOrFail($id);

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'judul' => 'required|string|unique:artikel,judul,' . $artikel->id . '|max:255',
                'short_deskripsi' => 'required|string|max:500',
                'long_deskripsi' => 'required|string',
                'kategori' => 'required|string|max:100',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('gambar')) {
                if ($artikel->gambar) {
                    Storage::disk('public')->delete($artikel->gambar);
                }
                $imagePath = $request->file('gambar')->store('artikels/featured_images', 'public');
                $validated['gambar'] = $imagePath;
            }

            $artikel->update($validated);

            // Hapus kategori dari session jika ada (karena sudah digunakan)
            CategoryHelper::removeFromSession($validated['kategori']);

            return redirect()->route('admin.artikel.index')
                ->with('success', 'Artikel berhasil diupdate!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function destroy($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $artikel = artikelModel::findOrFail($id);

            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }

            $artikel->delete();

            return redirect()->route('admin.artikel.index')
                ->with('success', 'Artikel berhasil dihapus!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function showKonten($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $artikel = artikelModel::findOrFail($id);
            $kontens = $artikel->konten()->paginate(10);

            return view('admin.artikel.konten', compact('artikel', 'kontens'));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function createKonten($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $artikel = artikelModel::findOrFail($id);
            return view('admin.artikel.konten_create', compact('artikel'));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function storeKonten(Request $request, $encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $artikel = artikelModel::findOrFail($id);

            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('gambar')) {
                $imagePath = $request->file('gambar')->store('artikel_contents', 'public');
                $validated['gambar'] = $imagePath;
            }

            $artikel->konten()->create($validated);

            return redirect()->route('admin.artikel.konten', encrypt($artikel->id))
                ->with('success', 'Konten artikel berhasil ditambahkan!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function editKonten($encryptedArtikelId, $encryptedKontenId)
    {
        try {
            $artikelId = Crypt::decrypt($encryptedArtikelId);
            $kontenId = Crypt::decrypt($encryptedKontenId);

            $artikel = artikelModel::findOrFail($artikelId);
            $konten = $artikel->konten()->findOrFail($kontenId);

            return view('admin.artikel.konten_edit', compact('artikel', 'konten'));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function updateKonten(Request $request, $encryptedArtikelId, $encryptedKontenId)
    {
        try {
            $artikelId = Crypt::decrypt($encryptedArtikelId);
            $kontenId = Crypt::decrypt($encryptedKontenId);

            $artikel = artikelModel::findOrFail($artikelId);
            $konten = $artikel->konten()->findOrFail($kontenId);

            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'nullable|string',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('gambar')) {
                if ($konten->gambar) {
                    Storage::disk('public')->delete($konten->gambar);
                }
                $imagePath = $request->file('gambar')->store('artikel_contents', 'public');
                $validated['gambar'] = $imagePath;
            }

            $konten->update($validated);

            return redirect()->route('admin.artikel.konten', encrypt($artikel->id))
                ->with('success', 'Konten artikel berhasil diupdate!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function destroyKonten($encryptedArtikelId, $encryptedKontenId)
    {
        try {
            $artikelId = Crypt::decrypt($encryptedArtikelId);
            $kontenId = Crypt::decrypt($encryptedKontenId);

            $artikel = artikelModel::findOrFail($artikelId);
            $konten = $artikel->konten()->findOrFail($kontenId);

            if ($konten->gambar) {
                Storage::disk('public')->delete($konten->gambar);
            }

            $konten->delete();

            return redirect()->route('admin.artikel.konten', encrypt($artikel->id))
                ->with('success', 'Konten artikel berhasil dihapus!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }
}
