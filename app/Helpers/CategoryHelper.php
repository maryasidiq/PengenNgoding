<?php

namespace App\Helpers;

use App\Models\artikelModel;
use App\Models\tipsModel;
use App\Models\videoModel;
use App\Models\portofolioModel;

class CategoryHelper
{
    public static function getAllCategories()
    {
        // Ambil kategori langsung dari masing-masing tabel
        $artikelCategories = artikelModel::distinct()->pluck('kategori')->filter();
        $tipsCategories = tipsModel::distinct()->pluck('kategori')->filter();
        $videoCategories = videoModel::distinct()->pluck('kategori')->filter();
        $portofolioCategories = portofolioModel::distinct()->pluck('kategori')->filter();

        // Ambil kategori dari session (kategori baru yang belum disimpan ke database)
        $sessionCategories = session('new_categories', []);

        $categories = collect()
            ->merge($artikelCategories)
            ->merge($tipsCategories)
            ->merge($videoCategories)
            ->merge($portofolioCategories)
            ->merge($sessionCategories)
            ->unique()
            ->sort()
            ->values();

        return $categories->toArray();
    }

    public static function removeFromSession($category)
    {
        $newCategories = session('new_categories', []);
        $key = array_search($category, $newCategories);
        if ($key !== false) {
            unset($newCategories[$key]);
            session(['new_categories' => array_values($newCategories)]);
        }
    }
}
