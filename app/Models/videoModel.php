<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class videoModel extends Model
{
    protected $table = "video";

    protected $fillable = ['nama', 'judul', 'short_deskripsi', 'long_deskripsi', 'kategori', 'gambar'];

    public function konten()
    {
        return $this->hasMany(videoContentModel::class, 'video_id');
    }
}
