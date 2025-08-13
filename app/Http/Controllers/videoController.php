<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\videoModel;
use App\Models\videoContentModel;

class videoController extends Controller
{
    public function index()
    {
        $videoUtama = videoModel::all();

        $kontenTerbaru = videoContentModel::with('video')
            ->orderBy('created_at', 'desc')
            ->paginate(6); // otomatis buat pagination

        return view('video', [
            'videos' => $videoUtama,
            'kontenTerbaru' => $kontenTerbaru
        ]);
    }


    function detail($id)
    {
        $video = videoModel::findOrFail($id);
        $bab = videoContentModel::where('video_id', $id)->get();

        // Ambil 4 konten tips terbaru beserta relasi tips
        $kontenTerbaru = videoContentModel::with('video')
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get()
            ->map(function ($item) {
                $item->short_deskripsi = strlen($item->deskripsi) > 100 ? substr($item->deskripsi, 0, 100) . '...' : $item->deskripsi;
                return $item;
            });

        return view('video/detail', [
            'video' => $video,
            'bab' => $bab,
            'kontenTerbaru' => $kontenTerbaru,
        ]);
    }

    function bab($id, $bab_id)
    {
        $video = videoModel::with('konten')->findOrFail($id);
        $bab = videoContentModel::where('id', $bab_id)
            ->where('video_id', $id)
            ->firstOrFail();

        // Ambil 3 konten terbaru
        $kontenTerbaru = videoContentModel::latest()->take(3)->get();

        // Konversi video_yt ke embed_url
        $embedUrl = $this->convertToEmbedUrl($bab->video_yt);



        return view('video/bab', [
            'video' => $video,
            'bab' => $bab,
            'embedUrl' => $embedUrl,
            'kontenTerbaru' => $kontenTerbaru,
        ]);
    }



    public function kategori()
    {
        $kategori = videoModel::select('kategori')->distinct()->get();

        return view('video.kategori', [
            'kategori' => $kategori
        ]);
    }

    public function kontenKategori($kategori)
    {
        $konten = videoContentModel::with('video')
            ->whereHas('video', function ($query) use ($kategori) {
                $query->where('kategori', $kategori);
            })
            ->paginate(6);


        return view('video.konten_kategori', [
            'konten' => $konten,
            'kategori' => $kategori,
        ]);
    }
    private function convertToEmbedUrl($url)
    {
        // Jika format youtu.be/uIkXrHCSank?si=...
        if (str_contains($url, 'youtu.be')) {
            // parse_url agar dapat path tanpa query
            $parsed = parse_url($url);
            $videoId = trim($parsed['path'], '/'); // hapus slash di depan
            return 'https://www.youtube.com/embed/' . $videoId;
        }

        // Jika format youtube.com/watch?v=uIkXrHCSank
        if (str_contains($url, 'youtube.com/watch')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $query);
            if (isset($query['v'])) {
                return 'https://www.youtube.com/embed/' . $query['v'];
            }
        }

        return null; // fallback
    }



}
