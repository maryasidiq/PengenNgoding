<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tipsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTipsController extends Controller
{
    public function index(Request $request)
    {
        $query = tipsModel::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('judul', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");
        }

        $tips = $query->latest()->paginate(10)->withQueryString();

        return view('admin.tips.index', compact('tips'));
    }

    public function create()
    {
        return view('admin.tips.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|unique:tips,judul|max:255',
            'short_deskripsi' => 'required|string|max:500',
            'long_deskripsi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('tipss/featured_images', 'public');
            $validated['gambar'] = $imagePath;
        }

        tipsModel::create($validated);

        return redirect()->route('admin.tips.index')
            ->with('success', 'tips berhasil ditambahkan!');
    }

    public function edit(tipsModel $tip)
    {
        return view('admin.tips.edit', compact('tip'));
    }

    public function update(Request $request, tipsModel $tip)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|unique:tips,judul,' . $tip->id . '|max:255',
            'short_deskripsi' => 'required|string|max:500',
            'long_deskripsi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($tip->gambar) {
                Storage::disk('public')->delete($tip->gambar);
            }
            $imagePath = $request->file('gambar')->store('tipss/featured_images', 'public');
            $validated['gambar'] = $imagePath;
        }

        $tip->update($validated);

        return redirect()->route('admin.tips.konten', $tip->id)
            ->with('success', 'tips berhasil diupdate!');
    }

    public function destroy(tipsModel $tip)
    {
        if ($tip->gambar) {
            Storage::disk('public')->delete($tip->gambar);
        }

        $tip->delete();

        return redirect()->route('admin.tips.index')
            ->with('success', 'tips berhasil dihapus!');
    }

    public function showKonten(tipsModel $tip)
    {
        $kontens = $tip->konten()->paginate(10);

        return view('admin.tips.konten', compact('tip', 'kontens'));
    }

    public function createKonten(tipsModel $tip)
    {
        return view('admin.tips.konten_create', compact('tip'));
    }

    public function storeKonten(Request $request, tipsModel $tip)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('tips_contents', 'public');
            $validated['gambar'] = $imagePath;
        }

        $tip->konten()->create($validated);

        return redirect()->route('admin.tips.konten', $tip->id)
            ->with('success', 'Konten tips berhasil ditambahkan!');
    }

    public function editKonten(tipsModel $tip, $kontenId)
    {
        $konten = $tip->konten()->findOrFail($kontenId);
        return view('admin.tips.konten_edit', compact('tip', 'konten'));
    }

    public function updateKonten(Request $request, tipsModel $tip, $kontenId)
    {
        $konten = $tip->konten()->findOrFail($kontenId);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($konten->gambar) {
                Storage::disk('public')->delete($konten->gambar);
            }
            $imagePath = $request->file('gambar')->store('tips_contents', 'public');
            $validated['gambar'] = $imagePath;
        }

        $konten->update($validated);

        return redirect()->route('admin.tips.konten', $tip->id)
            ->with('success', 'Konten tips berhasil diupdate!');
    }

    public function destroyKonten(tipsModel $tip, $kontenId)
    {
        $konten = $tip->konten()->findOrFail($kontenId);

        if ($konten->gambar) {
            Storage::disk('public')->delete($konten->gambar);
        }

        $konten->delete();

        return redirect()->route('admin.tips.konten', $tip->id)
            ->with('success', 'Konten tips berhasil dihapus!');
    }
}
