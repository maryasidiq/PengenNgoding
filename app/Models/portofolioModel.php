<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class portofolioModel extends Model
{
    protected $table = "portfolios";
    protected $fillable = [
        'judul',
        'deskripsi',
        'kategori',
        'gambar',
        'link',
        'screenshot',
        'dibuat_pada'
    ];

    // Relasi ke tabel portfolio_screenshots
    public function screenshots()
    {
        return $this->hasMany(portofolioScreenshotModel::class, 'portfolio_id');
    }
}


