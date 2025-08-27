<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\artikelModel;
use App\Models\tipsModel;
use App\Models\videoModel;
use App\Models\portofolioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class AdminCategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'new_category' => 'required|string|max:100'
        ]);

        // Simpan kategori sementara dalam session
        $tempCategories = session('temp_categories', []);
        $tempCategories[] = $request->new_category;
        session(['temp_categories' => array_unique($tempCategories)]);

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori "' . $request->new_category . '" disimpan sementara. Kategori akan tersimpan permanen saat digunakan pada item.');
    }

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

        // Tambahkan kategori sementara dari session
        $tempCategories = session('temp_categories', []);
        foreach ($tempCategories as $tempCategory) {
            if (!$allCategories->contains($tempCategory)) {
                $allCategories->push($tempCategory);
                $categoryCounts[$tempCategory] = 0; // Kategori sementara belum punya item
            }
        }

        // Urutkan ulang setelah menambahkan kategori sementara
        $allCategories = $allCategories->sort()->values();

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $allCategories = $allCategories->filter(function ($category) use ($search) {
                return stripos($category, $search) !== false;
            });
        }

        return view('admin.category.index', compact('allCategories', 'categoryCounts'));
    }

    public function show($encryptedCategory)
    {
        try {
            $category = Crypt::decrypt($encryptedCategory);

            // Cek apakah kategori ada di database atau di session
            $artikelItems = artikelModel::where('kategori', $category)->get();
            $tipsItems = tipsModel::where('kategori', $category)->get();
            $videoItems = videoModel::where('kategori', $category)->get();
            $portofolioItems = portofolioModel::where('kategori', $category)->get();

            $tempCategories = session('temp_categories', []);
            $isTemporary = empty($artikelItems) && empty($tipsItems) && empty($videoItems) && empty($portofolioItems)
                && in_array($category, $tempCategories);

            return view('admin.category.show', compact(
                'category',
                'artikelItems',
                'tipsItems',
                'videoItems',
                'portofolioItems',
                'isTemporary'
            ));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }

    public function edit($encryptedCategory)
    {
        try {
            $category = Crypt::decrypt($encryptedCategory);
            return view('admin.category.edit', compact('category'));
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
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

        // Update kategori sementara di session jika ada
        $tempCategories = session('temp_categories', []);
        if (in_array($oldCategory, $tempCategories)) {
            $tempCategories = array_diff($tempCategories, [$oldCategory]);
            $tempCategories[] = $newCategory;
            session(['temp_categories' => array_unique($tempCategories)]);
        }

        return redirect()->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diubah dari "' . $oldCategory . '" ke "' . $newCategory . '"');
    }

    public function destroy($encryptedCategory)
    {
        try {
            $category = Crypt::decrypt($encryptedCategory);

            // Hapus kategori dari semua item (set menjadi null atau string kosong)
            artikelModel::where('kategori', $category)->update(['kategori' => null]);
            tipsModel::where('kategori', $category)->update(['kategori' => null]);
            videoModel::where('kategori', $category)->update(['kategori' => null]);
            portofolioModel::where('kategori', $category)->update(['kategori' => null]);

            // Hapus kategori sementara dari session jika ada
            $tempCategories = session('temp_categories', []);
            $tempCategories = array_diff($tempCategories, [$category]);
            session(['temp_categories' => $tempCategories]);

            return redirect()->route('admin.kategori.index')
                ->with('success', 'Kategori "' . $category . '" berhasil dihapus dari semua item');
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }
}
