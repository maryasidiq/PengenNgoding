<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tipsModel;
use App\Models\tipsContentModel;

class tipsController extends Controller
{
    public function index()
    {
        $tipsUtama = tipsModel::all();

        $kontenTerbaru = tipsContentModel::with('tips')
            ->orderBy('created_at', 'desc')
            ->paginate(6); // otomatis buat pagination

        return view('tips', [
            'tipss' => $tipsUtama,
            'kontenTerbaru' => $kontenTerbaru
        ]);
    }


    function detail($id)
    {
        $tips = tipsModel::findOrFail($id);
        $bab = tipsContentModel::where('tips_id', $id)->get();

        return view('tips/detail', [
            'tips' => $tips,
            'bab' => $bab,
        ]);
    }


    function bab($id, $bab_id)
    {
        $tips = tipsModel::with('konten')->findOrFail($id);
        $bab = tipsContentModel::where('id', $bab_id)
            ->where('tips_id', $id)
            ->firstOrFail();

        // Ambil 3 konten terbaru
        $kontenTerbaru = tipsContentModel::latest()->take(3)->get();

        return view('tips/bab', [
            'tips' => $tips,
            'bab' => $bab,
            'kontenTerbaru' => $kontenTerbaru, // ⬅️ Dikirim ke Blade
        ]);
    }


    public function kategori()
    {
        $kategori = tipsModel::select('kategori')->distinct()->get();

        return view('tips.kategori', [
            'kategori' => $kategori
        ]);
    }

    public function kontenKategori($kategori)
    {
        $konten = tipsContentModel::with('tips')
            ->whereHas('tips', function ($query) use ($kategori) {
                $query->where('kategori', $kategori);
            })
            ->paginate(6);


        return view('tips.konten_kategori', [
            'konten' => $konten,
            'kategori' => $kategori,
        ]);
    }


}
