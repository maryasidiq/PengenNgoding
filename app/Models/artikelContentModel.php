<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artikelContentModel extends Model
{
    protected $table = "artikel_content";

    protected $fillable = [
        'artikel_id',
        'judul',
        'deskripsi',
        'gambar',
    ];

    public function artikel()
    {
        return $this->belongsTo(artikelModel::class, 'artikel_id');
    }



    public function kontenKategori($kategori)
    {
        $konten = artikelContentModel::with('artikel')
            ->whereHas('artikel', function ($query) use ($kategori) {
                $query->where('kategori', $kategori);
            })
            ->paginate(6); // jika pakai pagination

        return view('artikel.konten_kategori', compact('konten', 'kategori'));
    }

}
