<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class portofolioScreenshotModel extends Model
{
    protected $table = "portfolio_screenshots";
    public $timestamps = false;

    protected $fillable = ['portfolio_id', 'screenshot'];

    
}
