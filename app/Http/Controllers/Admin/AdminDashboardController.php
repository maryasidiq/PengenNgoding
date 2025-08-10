<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\portofolioModel;
use App\Models\clientModel;
use App\Models\artikelModel;
use App\Models\tipsModel;
use App\Models\videoModel;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalPortofolio = portofolioModel::count();
        $totalClient = clientModel::count();
        $totalArtikel = artikelModel::count();
        $totalTips = tipsModel::count();
        $totalVideo = videoModel::count();

        return view('admin.dashboard', compact(
            'totalPortofolio',
            'totalClient',
            'totalArtikel',
            'totalTips',
            'totalVideo'
        ));
    }
}
