<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\artikelModel;
use App\Models\artikelContentModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

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


    function detail($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            $artikel = artikelModel::findOrFail($id);
            $bab = artikelContentModel::where('artikel_id', $id)->get();

            // Ambil 4 konten artikel terbaru beserta relasi artikel
            $kontenTerbaru = artikelContentModel::with('artikel')
                ->orderBy('updated_at', 'desc')
                ->take(4)
                ->get()
                ->map(function ($item) {
                    $item->short_deskripsi = strlen($item->deskripsi) > 100 ? substr($item->deskripsi, 0, 100) . '...' : $item->deskripsi;
                    return $item;
                });

            return view('artikel/detail', [
                'artikel' => $artikel,
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
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
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
        // Untuk kategori, kita tidak perlu enkripsi karena ini adalah string biasa
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
