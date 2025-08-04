<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artikelModel extends Model
{
    protected $table = "artikel";

    public function konten()
    {
        return $this->hasMany(artikelContentModel::class, 'artikel_id');
    }
}
