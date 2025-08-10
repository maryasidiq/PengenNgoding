<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artikelModel extends Model
{
    protected $table = "artikel";

    protected $fillable = [
        'nama',
        'judul',
        'short_deskripsi',
        'long_deskripsi',
        'kategori',
        'gambar',
    ];

    public function konten()
    {
        return $this->hasMany(artikelContentModel::class, 'artikel_id');
    }
}
