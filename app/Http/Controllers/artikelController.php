<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\artikelModel;
use App\Models\artikelContentModel;

class artikelController extends Controller
{
    public function index()
    {
        $artikelUtama = artikelModel::all();

        $kontenTerbaru = artikelContentModel::with('artikel')
            ->orderBy('created_at', 'desc')
            ->paginate(6); // otomatis buat pagination

        return view('artikel', [
            'artikels' => $artikelUtama,
            'kontenTerbaru' => $kontenTerbaru
        ]);
    }


    function detail($id)
    {
        $artikel = artikelModel::findOrFail($id);
        $bab = artikelContentModel::where('artikel_id', $id)->get();

        return view('artikel/detail', [
            'artikel' => $artikel,
            'bab' => $bab,
        ]);
    }


    function bab($id, $bab_id)
    {
        $artikel = artikelModel::with('konten')->findOrFail($id);
        $bab = artikelContentModel::where('id', $bab_id)
            ->where('artikel_id', $id)
            ->firstOrFail();

        // Ambil 3 konten terbaru
        $kontenTerbaru = artikelContentModel::latest()->take(3)->get();

        return view('artikel/bab', [
            'artikel' => $artikel,
            'bab' => $bab,
            'kontenTerbaru' => $kontenTerbaru, // ⬅️ Dikirim ke Blade
        ]);
    }


    public function kategori()
    {
        $kategori = artikelModel::select('kategori')->distinct()->get();

        return view('artikel.kategori', [
            'kategori' => $kategori
        ]);
    }

    public function kontenKategori($kategori)
    {
        $konten = artikelContentModel::with('artikel')
            ->whereHas('artikel', function ($query) use ($kategori) {
                $query->where('kategori', $kategori);
            })
            ->paginate(6);


        return view('artikel.konten_kategori', [
            'konten' => $konten,
            'kategori' => $kategori,
        ]);
    }



}
