<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipsModel extends Model
{
    use HasFactory;

    protected $table = 'tips';

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
        return $this->hasMany(tipsContentModel::class, 'tips_id');
    }
}
