<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\clientModel;

class clientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
        ['nama' => 'PT. Parkland World Indonesia', 'gambar' => '/images/beranda/parkland.jpg'],
        ['nama' => 'BPKAD Jepara', 'gambar' => '/images/beranda/bpkad.jpg'],
        ['nama' => 'Konsorsium Jepara Gerak', 'gambar' => '/images/beranda/konosrium.jpg'],
        ['nama' => 'Dinsospermasdes Jepara', 'gambar' => '/images/beranda/dinsospermasdes.jpg'],
        ['nama' => 'DPMPTSP Jepara', 'gambar' => '/images/beranda/dpmptsp.jpg'],
        ['nama' => 'DPUPR Jepara', 'gambar' => '/images/beranda/dpupr.jpg'],
        ['nama' => 'Kwarcab Jepara', 'gambar' => '/images/beranda/kwarcab.png'],
        ['nama' => 'PT. Prodecowood Jepara', 'gambar' => '/images/beranda/prodecowood.png'],
        ['nama' => 'WNS OTO Jepara', 'gambar' => '/images/beranda/wns_oto.jpg'],
    ];

    foreach ($data as $d) {
        clientModel::create($d);
    }
    }
}
