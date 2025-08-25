<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\artikelModel;
use App\Models\tipsModel;
use App\Models\videoModel;
use App\Models\portofolioModel;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua kategori unik dari semua tabel
        $artikelCategories = artikelModel::distinct()->pluck('kategori')->filter();
        $tipsCategories = tipsModel::distinct()->pluck('kategori')->filter();
        $videoCategories = videoModel::distinct()->pluck('kategori')->filter();
        $portofolioCategories = portofolioModel::distinct()->pluck('kategori')->filter();

        // Gabungkan semua kategori
        $allCategories = collect()
            ->merge($artikelCategories)
            ->merge($tipsCategories)
            ->merge($videoCategories)
            ->merge($portofolioCategories)
            ->unique()
            ->sort()
            ->values();

        // Hitung jumlah item per kategori
        $categoryCounts = [];
        foreach ($allCategories as $category) {
            $count = artikelModel::where('kategori', $category)->count() +
                tipsModel::where('kategori', $category)->count() +
                videoModel::where('kategori', $category)->count() +
                portofolioModel::where('kategori', $category)->count();

            $categoryCounts[$category] = $count;
        }

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $allCategories = $allCategories->filter(function ($category) use ($search) {
                return stripos($category, $search) !== false;
            });
        }

        return view('admin.category.index', compact('allCategories', 'categoryCounts'));
    }

    public function show($category)
    {
        // Ambil semua item dengan kategori tertentu
        $artikelItems = artikelModel::where('kategori', $category)->get();
        $tipsItems = tipsModel::where('kategori', $category)->get();
        $videoItems = videoModel::where('kategori', $category)->get();
        $portofolioItems = portofolioModel::where('kategori', $category)->get();

        return view('admin.category.show', compact(
            'category',
            'artikelItems',
            'tipsItems',
            'videoItems',
            'portofolioItems'
        ));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'new_category' => 'required|string|max:100'
        ]);

        $newCategory = $request->new_category;

        // Simpan kategori baru ke session untuk sementara
        $newCategories = session('new_categories', []);
        if (!in_array($newCategory, $newCategories)) {
            $newCategories[] = $newCategory;
            session(['new_categories' => $newCategories]);
        }

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori "' . $newCategory . '" siap digunakan. Kategori akan tersimpan otomatis saat digunakan di artikel/tips/video/portofolio.')
            ->with('new_category', $newCategory);
    }

    public function edit($category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $oldCategory)
    {
        $request->validate([
            'new_category' => 'required|string|max:100'
        ]);

        $newCategory = $request->new_category;

        // Update kategori di semua tabel
        artikelModel::where('kategori', $oldCategory)->update(['kategori' => $newCategory]);
        tipsModel::where('kategori', $oldCategory)->update(['kategori' => $newCategory]);
        videoModel::where('kategori', $oldCategory)->update(['kategori' => $newCategory]);
        portofolioModel::where('kategori', $oldCategory)->update(['kategori' => $newCategory]);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diubah dari "' . $oldCategory . '" ke "' . $newCategory . '"');
    }

    public function destroy($category)
    {
        // Hapus kategori dari semua item (set menjadi null atau string kosong)
        artikelModel::where('kategori', $category)->update(['kategori' => null]);
        tipsModel::where('kategori', $category)->update(['kategori' => null]);
        videoModel::where('kategori', $category)->update(['kategori' => null]);
        portofolioModel::where('kategori', $category)->update(['kategori' => null]);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori "' . $category . '" berhasil dihapus dari semua item');
    }
}
