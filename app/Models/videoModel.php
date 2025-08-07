<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class videoModel extends Model
{
    protected $table = "video";

    public function konten()
    {
        return $this->hasMany(videoContentModel::class, 'video_id');
    }
}
