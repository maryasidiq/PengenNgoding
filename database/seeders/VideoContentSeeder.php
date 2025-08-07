<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\videoContentModel;


class VideoContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $data = [
            [
                'video_id' => '1',
                'judul' => 'Bab 1  Definisi Content Integration Model (CIM) Peer for Tutoring dalam Pemecahan Masalah Game',
                'gambar'=> 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg',
                'video_yt' => 'https://youtu.be/uIkXrHCSank?si=YLbtkxJ7irzDjgBZ',
                'deskripsi' => '<section>
  <h2>Permasalahan dalam Game</h2>
  <ul>
    <li><strong>Kesulitan dalam Memahami Peraturan dan Mekanika Permainan:</strong> Pemain bingung dengan sistem atau cara bermain.</li>
    <li><strong>Tantangan Kesulitan Permainan (Difficulty):</strong> Level terlalu sulit sehingga pemain cepat frustrasi.</li>
    <li><strong>Masalah Teknis:</strong> Bug atau error yang mengganggu proses bermain.</li>
    <li><strong>Kebosanan:</strong> Kurangnya variasi konten menyebabkan pemain kehilangan minat.</li>
    <li><strong>Keterbatasan Waktu:</strong> Pemain tidak memiliki cukup waktu untuk mendalami permainan.</li>
  </ul>
</section>

<section>
  <h2>Apa itu Content Integration Model (CIM)?</h2>
  <p>
    <strong>Content Integration Model (CIM)</strong> adalah kerangka kerja yang digunakan untuk menyisipkan elemen edukatif ke dalam permainan.
    Dengan CIM, pembelajaran dan gameplay dipadukan agar pemain dapat lebih efektif dalam memecahkan masalah yang muncul di dalam game.
  </p>
  <p>
    CIM memungkinkan pemain tidak hanya bermain, tetapi juga belajar dari pengalaman mereka dalam permainan.
  </p>
</section>

<section>
  <h2>Tujuan CIM dalam Pemecahan Masalah Game</h2>
  <ul>
    <li>Memungkinkan pemain memahami dan mengatasi tantangan dalam permainan secara efektif.</li>
    <li>Mendorong kolaborasi dan peer-tutoring antar pemain untuk saling membantu dan belajar.</li>
    <li>Membangun komunitas pemain yang saling mendukung dalam menyelesaikan masalah bersama.</li>
  </ul>
</section>

<section>
  <h2>Pembelajaran Berbasis Multimedia</h2>
  <p>
    Dalam konteks ini, CIM juga mengintegrasikan <strong>media visual, audio, dan interaktif</strong> untuk menciptakan pengalaman belajar yang menyenangkan dan efektif.
    Pemanfaatan video, animasi, serta interaksi peer-to-peer membuat proses pemecahan masalah lebih menarik dan bermakna.
  </p>
</section>'
            ],

        ];

        foreach ($data as $item) {
            videoContentModel::create($item);
        }
    }
}
