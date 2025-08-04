<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tipsModel extends Model
{
    protected $table = "tips";

    public function konten()
    {
        return $this->hasMany(tipsContentModel::class, 'tips_id');
    }
}