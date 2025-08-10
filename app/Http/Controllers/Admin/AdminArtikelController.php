<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\artikelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit(artikelModel $artikel)
    {
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, artikelModel $artikel)
    {
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

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diupdate!');
    }

    public function destroy(artikelModel $artikel)
    {
        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }

    public function showKonten(artikelModel $artikel)
    {
        $kontens = $artikel->konten()->paginate(10);

        return view('admin.artikel.konten', compact('artikel', 'kontens'));
    }

    public function createKonten(artikelModel $artikel)
    {
        return view('admin.artikel.konten_create', compact('artikel'));
    }

    public function storeKonten(Request $request, artikelModel $artikel)
    {
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

        return redirect()->route('admin.artikel.konten', $artikel->id)
            ->with('success', 'Konten artikel berhasil ditambahkan!');
    }

    public function editKonten(artikelModel $artikel, $kontenId)
    {
        $konten = $artikel->konten()->findOrFail($kontenId);
        return view('admin.artikel.konten_edit', compact('artikel', 'konten'));
    }

    public function updateKonten(Request $request, artikelModel $artikel, $kontenId)
    {
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

        return redirect()->route('admin.artikel.konten', $artikel->id)
            ->with('success', 'Konten artikel berhasil diupdate!');
    }

    public function destroyKonten(artikelModel $artikel, $kontenId)
    {
        $konten = $artikel->konten()->findOrFail($kontenId);

        if ($konten->gambar) {
            Storage::disk('public')->delete($konten->gambar);
        }

        $konten->delete();

        return redirect()->route('admin.artikel.konten', $artikel->id)
            ->with('success', 'Konten artikel berhasil dihapus!');
    }
}
