<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clientModel;
use App\Models\testimoniModel;
use App\Models\portofolioModel;


class berandaController extends Controller
{
    function index()
    {
        // $data = clientModel::select('nama','gambar')->get()->toArray(); 
        return view('beranda', [
            // 'clients'       => clientModel::all(),
            'clients' => clientModel::select('id', 'nama', 'gambar')->get(),
            'testimonis' => testimoniModel::select('id', 'nama', 'jabatan', 'pesan')->get(),
            'portofolios' => portofolioModel::select('id', 'judul', 'gambar')->latest()->take(6)->get(),
            'title' => 'beranda'
        ]);
    }

}
