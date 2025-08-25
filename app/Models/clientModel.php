<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class clientModel extends Model
{
    protected $table = "clinet";
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'gambar'
    ];

}
