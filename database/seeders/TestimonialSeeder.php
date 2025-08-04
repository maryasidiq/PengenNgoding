<?php

namespace Database\Seeders;

use App\Models\testimoniModel;
use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Budi Sulistyono',
                'jabatan' => 'Kabid',
                'instansi' => 'Disospermades Kabupaten Jepara',
                'pesan' => 'Jeparacare merupakan aplikasi yang dibuat untuk melayani bantuan sosial media dari pengelolaan stock bantuan, pengajuan assesment, dan monitoring distribusinya. Terima kasih PengenNgoding',
                
            ],
            [
                'nama' => 'Siti Nur Azizah',
                'jabatan' => 'Staf',
                'instansi' => 'DPMPTSP Jepara',
                'pesan' => 'Aplikasi yang sangat membantu proses administrasi kami. Mudah digunakan dan sangat cepat.',
                
            ],
            [
                'nama' => 'Ahmad Fauzi',
                'jabatan' => null,
                'instansi' => 'DPUPR Jepara',
                'pesan' => 'Sangat terbantu dengan digitalisasi dari tim PengenNgoding. Proses lebih efisien dan transparan.',
                
            ],
        ];

        foreach ($data as $d) {
            testimoniModel::create($d);
        }
    }
}
