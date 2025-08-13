<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class videoContentModel extends Model
{
    protected $table = "video_content";

    protected $fillable = [
        'video_id',
        'judul',
        'deskripsi',
        'gambar',
        'video_yt'
    ];

    public function video()
    {
        return $this->belongsTo(videoModel::class, 'video_id');
    }

    public function kontenKategori($kategori)
    {
        $konten = videoContentModel::with('video')
            ->whereHas('video', function ($query) use ($kategori) {
                $query->where('kategori', $kategori);
            })
            ->paginate(6);

        return view('video.konten_kategori', compact('konten', 'kategori'));
    }
}
