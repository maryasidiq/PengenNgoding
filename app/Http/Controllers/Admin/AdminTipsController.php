<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tipsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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

    public function edit($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $tip = tipsModel::findOrFail($id);
            return view('admin.tips.edit', compact('tip'));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function update(Request $request, $encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $tip = tipsModel::findOrFail($id);

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

            return redirect()->route('admin.tips.konten', encrypt($tip->id))
                ->with('success', 'Tips berhasil diupdate!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function destroy($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $tip = tipsModel::findOrFail($id);

            if ($tip->gambar) {
                Storage::disk('public')->delete($tip->gambar);
            }

            $tip->delete();

            return redirect()->route('admin.tips.index')
                ->with('success', 'Tips berhasil dihapus!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function showKonten($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $tip = tipsModel::findOrFail($id);
            $kontens = $tip->konten()->paginate(10);

            return view('admin.tips.konten', compact('tip', 'kontens'));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function createKonten($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $tip = tipsModel::findOrFail($id);
            return view('admin.tips.konten_create', compact('tip'));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function storeKonten(Request $request, $encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $tip = tipsModel::findOrFail($id);

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

            return redirect()->route('admin.tips.konten', encrypt($tip->id))
                ->with('success', 'Konten tips berhasil ditambahkan!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function editKonten($encryptedTipId, $encryptedKontenId)
    {
        try {
            $tipId = Crypt::decrypt($encryptedTipId);
            $kontenId = Crypt::decrypt($encryptedKontenId);

            $tip = tipsModel::findOrFail($tipId);
            $konten = $tip->konten()->findOrFail($kontenId);

            return view('admin.tips.konten_edit', compact('tip', 'konten'));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function updateKonten(Request $request, $encryptedTipId, $encryptedKontenId)
    {
        try {
            $tipId = Crypt::decrypt($encryptedTipId);
            $kontenId = Crypt::decrypt($encryptedKontenId);

            $tip = tipsModel::findOrFail($tipId);
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

            return redirect()->route('admin.tips.konten', encrypt($tip->id))
                ->with('success', 'Konten tips berhasil diupdate!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function destroyKonten($encryptedTipId, $encryptedKontenId)
    {
        try {
            $tipId = Crypt::decrypt($encryptedTipId);
            $kontenId = Crypt::decrypt($encryptedKontenId);

            $tip = tipsModel::findOrFail($tipId);
            $konten = $tip->konten()->findOrFail($kontenId);

            if ($konten->gambar) {
                Storage::disk('public')->delete($konten->gambar);
            }

            $konten->delete();

            return redirect()->route('admin.tips.konten', encrypt($tip->id))
                ->with('success', 'Konten tips berhasil dihapus!');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }
}
