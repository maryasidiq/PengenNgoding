<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\videoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVideoController extends Controller
{
    public function index(Request $request)
    {
        $query = videoModel::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama', 'like', "%{$search}%")
                ->orWhere('judul', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");
        }

        $videos = $query->latest()->paginate(10)->withQueryString();

        return view('admin.video.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.video.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|unique:video,judul|max:255',
            'short_deskripsi' => 'required|string|max:500',
            'long_deskripsi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('videos/featured_images', 'public');
            $validated['gambar'] = $imagePath;
        }

        videoModel::create($validated);

        return redirect()->route('admin.video.index')
            ->with('success', 'video berhasil ditambahkan!');
    }

    public function edit(videoModel $video)
    {
        return view('admin.video.edit', compact('video'));
    }

    public function update(Request $request, videoModel $video)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'judul' => 'required|string|unique:video,judul,' . $video->id . '|max:255',
            'short_deskripsi' => 'required|string|max:500',
            'long_deskripsi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($video->gambar) {
                Storage::disk('public')->delete($video->gambar);
            }
            $imagePath = $request->file('gambar')->store('videos/featured_images', 'public');
            $validated['gambar'] = $imagePath;
        }

        $video->update($validated);

        return redirect()->route('admin.video.index')
            ->with('success', 'video berhasil diupdate!');
    }

    public function destroy(videoModel $video)
    {
        if ($video->gambar) {
            Storage::disk('public')->delete($video->gambar);
        }

        $video->delete();

        return redirect()->route('admin.video.index')
            ->with('success', 'video berhasil dihapus!');
    }

    public function showKonten(videoModel $video)
    {
        $kontens = $video->konten()->paginate(10);

        return view('admin.video.konten', compact('video', 'kontens'));
    }

    public function createKonten(videoModel $video)
    {
        return view('admin.video.konten_create', compact('video'));
    }

    public function storeKonten(Request $request, videoModel $video)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('video_contents', 'public');
            $validated['gambar'] = $imagePath;
        }

        $video->konten()->create($validated);

        return redirect()->route('admin.video.konten', $video->id)
            ->with('success', 'Konten video berhasil ditambahkan!');
    }

    public function editKonten(videoModel $video, $kontenId)
    {
        $konten = $video->konten()->findOrFail($kontenId);
        return view('admin.video.konten_edit', compact('video', 'konten'));
    }

    public function updateKonten(Request $request, videoModel $video, $kontenId)
    {
        $konten = $video->konten()->findOrFail($kontenId);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($konten->gambar) {
                Storage::disk('public')->delete($konten->gambar);
            }
            $imagePath = $request->file('gambar')->store('video_contents', 'public');
            $validated['gambar'] = $imagePath;
        }

        $konten->update($validated);

        return redirect()->route('admin.video.konten', $video->id)
            ->with('success', 'Konten video berhasil diupdate!');
    }

    public function destroyKonten(videoModel $video, $kontenId)
    {
        $konten = $video->konten()->findOrFail($kontenId);

        if ($konten->gambar) {
            Storage::disk('public')->delete($konten->gambar);
        }

        $konten->delete();

        return redirect()->route('admin.video.konten', $video->id)
            ->with('success', 'Konten video berhasil dihapus!');
    }
}
