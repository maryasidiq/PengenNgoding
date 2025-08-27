<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\portofolioModel;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class portofolioController extends Controller
{
    function index()
    {
        // $data = clientModel::select('nama','gambar')->get()->toArray(); 
        return view('/portofolio/index', [
            'portofolios' => portofolioModel::with('screenshots')->get(),
            //  'portofolios'       =>portofolioModel::select('nama','jabatan','pesan')->get(),
            'title' => '/portofolio/index'
        ]);
    }
    public function show($encryptedId)
    {
        try {
            $id = Crypt::decrypt($encryptedId);
            // Ambil data berdasarkan ID
            $portofolio = portofolioModel::findOrFail($id);

            $related = portofolioModel::where('kategori', $portofolio->kategori)
                ->where('id', '!=', $portofolio->id)
                ->latest()
                ->take(3)
                ->get();

            return view('portofolio.show', [
                'portofolio' => $portofolio,
                'related' => $related,
            ]);
        } catch (DecryptException $e) {
            abort(404, 'Tautan tidak valid');
        }
    }


}
