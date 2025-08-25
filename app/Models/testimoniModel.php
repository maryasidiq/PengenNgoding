<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class testimoniModel extends Model
{
    protected $table = "testimonials";

    protected $fillable = [
        'nama',
        'jabatan',
        'instansi',
        'pesan'
    ];
}
