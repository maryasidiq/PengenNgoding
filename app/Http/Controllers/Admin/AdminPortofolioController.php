<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\portofolioModel;
use App\Models\portofolioScreenshotModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPortofolioController extends Controller
{
    public function index(Request $request)
    {
        $query = portofolioModel::with('screenshots')->latest();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                    ->orWhere('kategori', 'like', "%{$search}%")
                    ->orWhere('deskripsi', 'like', "%{$search}%")
                    ->orWhere('link', 'like', "%{$search}%");
            });
        }

        $portofolios = $query->paginate(10)->withQueryString();

        return view('admin.portofolio.index', compact('portofolios'));
    }

    public function create()
    {
        return view('admin.portofolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_url' => 'nullable|url',
            'project_date' => 'required|date',
            'technologies' => 'required|string',
            'description' => 'required|string',
            'github_url' => 'nullable|url'
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('portofolio/thumbnail', 'public');
            $validated['gambar'] = $thumbnailPath;
        }

        $portofolio = portofolioModel::create([
            'judul' => $validated['title'],
            'deskripsi' => $validated['description'],
            'kategori' => $validated['category'],
            'gambar' => $validated['gambar'],
            'link' => $validated['project_url'],
            'dibuat_pada' => $validated['project_date']
        ]);

        // Handle screenshots upload
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $screenshotPath = $screenshot->store('portofolio/screenshots', 'public');
                portofolioScreenshotModel::create([
                    'portfolio_id' => $portofolio->id,
                    'screenshot' => $screenshotPath
                ]);
            }
        }

        return redirect()->route('admin.portofolio.index')
            ->with('success', 'Portofolio berhasil ditambahkan!');
    }

    public function edit(portofolioModel $portofolio)
    {
        return view('admin.portofolio.edit', compact('portofolio'));
    }

    public function update(Request $request, portofolioModel $portofolio)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:100',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'link' => 'nullable|url',
            'dibuat_pada' => 'required|date'
        ]);

        // Handle gambar update
        if ($request->hasFile('gambar')) {
            // Delete old gambar
            if ($portofolio->gambar) {
                Storage::disk('public')->delete($portofolio->gambar);
            }
            $gambarPath = $request->file('gambar')->store('portofolio/gambar', 'public');
            $validated['gambar'] = $gambarPath;
        }

        $portofolio->update($validated);

        // Handle delete screenshots
        if ($request->has('delete_screenshots')) {
            $deleteIds = $request->input('delete_screenshots');
            foreach ($deleteIds as $id) {
                $screenshot = portofolioScreenshotModel::find($id);
                if ($screenshot) {
                    Storage::disk('public')->delete($screenshot->screenshot);
                    $screenshot->delete();
                }
            }
        }

        // Handle new screenshots
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $screenshot) {
                $screenshotPath = $screenshot->store('portofolio/screenshots', 'public');
                portofolioScreenshotModel::create([
                    'portfolio_id' => $portofolio->id,
                    'screenshot' => $screenshotPath
                ]);
            }
        }

        return redirect()->route('admin.portofolio.index')
            ->with('success', 'Portofolio berhasil diupdate!');
    }

    public function destroy(portofolioModel $portofolio)
    {
        // Delete thumbnail
        if (!empty($portofolio->gambar)) {
            Storage::disk('public')->delete($portofolio->gambar);
        }

        // Delete screenshots
        foreach ($portofolio->screenshots as $screenshot) {
            if (!empty($screenshot->screenshot)) {
                Storage::disk('public')->delete($screenshot->screenshot);
            }
            $screenshot->delete();
        }

        $portofolio->delete();

        return redirect()->route('admin.portofolio.index')
            ->with('success', 'Portofolio berhasil dihapus!');
    }
}
