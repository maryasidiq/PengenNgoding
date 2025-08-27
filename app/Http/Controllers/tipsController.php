<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tipsModel;
use App\Models\tipsContentModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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


    function detail($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $tips = tipsModel::findOrFail($id);
            $bab = tipsContentModel::where('tips_id', $id)->get();

            // Ambil 4 konten tips terbaru beserta relasi tips
            $kontenTerbaru = tipsContentModel::with('tips')
                ->orderBy('updated_at', 'desc')
                ->take(4)
                ->get()
                ->map(function ($item) {
                    $item->short_deskripsi = strlen($item->deskripsi) > 100 ? substr($item->deskripsi, 0, 100) . '...' : $item->deskripsi;
                    return $item;
                });

            return view('tips/detail', [
                'tips' => $tips,
                'bab' => $bab,
                'kontenTerbaru' => $kontenTerbaru,
            ]);
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }


    function bab($encryptedId, $encryptedBabId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $bab_id = Crypt::decrypt($encryptedBabId);
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
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
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
