<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipsContentModel extends Model
{
    protected $table = "tips_content";

    protected $fillable = ['judul', 'deskripsi', 'gambar', 'tips_id'];

    public function tips()
    {
        return $this->belongsTo(tipsModel::class, 'tips_id');
    }

    public function kontenKategori($kategori)
    {
        $konten = tipsContentModel::with('tips')
            ->whereHas('tips', function ($query) use ($kategori) {
                $query->where('kategori', $kategori);
            })
            ->paginate(6);

        return view('tips.konten_kategori', compact('konten', 'kategori'));
    }
}
