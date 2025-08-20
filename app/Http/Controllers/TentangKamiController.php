<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\portofolioModel;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $portofolios = portofolioModel::select('id', 'judul', 'gambar')
            ->latest()
            ->take(3)
            ->get();

        return view('ttg_kami', [
            'portofolios' => $portofolios
        ]);
    }
}
