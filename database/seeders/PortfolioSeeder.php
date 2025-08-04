<?php

namespace Database\Seeders;

use App\Models\portofolioModel;
use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Jepara International Furniture Buyer Weeks Application',
                'deskripsi' => '<p>Jepara International Furniture Buyer Weeks (JIFBW) merupakan acara tahunan yang diadakan oleh pemerintah
                daerah
                Jepara untuk mempromosikan produk mebel dan kerajinan dari kota tersebut. Pada acara JIFBW kali ini,
                pameran dilakukan secara daring melalui aplikasi yang dapat diakses melalui smartphone atau komputer.
            </p>

            <p><strong>Aplikasi</strong> pameran online ini hadir sebagai solusi alternatif bagi pengunjung yang tidak
                dapat
                hadir langsung ke lokasi pameran karena kendala waktu dan jarak. Dengan aplikasi ini, pengunjung dapat
                menikmati pengalaman pameran yang hampir sama dengan yang diadakan di lokasi asli. Mereka dapat melihat
                produk-produk terbaru dari berbagai vendor di Jepara dan berinteraksi dengan para penjual melalui fitur
                chat yang disediakan di aplikasi.</p>

            <p>Selain itu, aplikasi pameran online ini juga memudahkan para pembeli untuk memilih dan membeli produk
                yang
                diinginkan secara langsung dari vendor tanpa perlu datang ke tempat pameran. Mereka dapat memilih produk
                yang disukai, menyelesaikan pembayaran secara online, dan menunggu produk pesanan mereka dikirim ke
                alamat
                yang diinginkan.</p>

            <p>Dalam aplikasi pameran online ini, para vendor juga dapat memamerkan produk-produk terbaru mereka dengan
                lebih mudah dan efisien. Mereka dapat mengunggah foto dan deskripsi produk dengan lengkap, sehingga para
                pembeli dapat memahami dan mengetahui lebih jelas mengenai produk yang ditawarkan.</p>

            <p>Dengan hadirnya aplikasi pameran online ini, JIFBW semakin memperluas jangkauan promosi produk-produk
                mebel
                dan kerajinan dari Jepara ke seluruh dunia. Para pengunjung dari berbagai negara dapat dengan mudah
                mengakses pameran online ini dan menikmati pengalaman yang sama seperti saat hadir langsung di lokasi
                pameran.</p>',
                'kategori' => 'Web Application',
                'gambar' => 'images/jif.jpg',
                'link' => 'https://jifbw.com',
                'screenshot' => null,
                'dibuat_pada' => '2023-10-01',
                'created_at' => now()
            ],
            [
                'judul' => 'COMPANY PROFILE PT.PRODECOWOOD INDONESIA',
                'deskripsi' => 'Profil perusahaan untuk menampilkan informasi bisnis dan layanan PT Prodecowood.',
                'kategori' => 'Company Profile',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/5065e633-b098-45a9-8b1a-e44aa9288b21.png',
                'link' => null,
                'screenshot' => null,
                'dibuat_pada' => '2023-07-15',
                'created_at' => now()
            ],
            [
                'judul' => 'SKM (Survey Kepuasan Masyarakat) Mall Pelayanan Publik Jepara',
                'deskripsi' => 'Dashboard interaktif untuk mengukur kepuasan masyarakat terhadap pelayanan publik.',
                'kategori' => 'Survey System',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a731ec89-4081-42f7-9bde-0772dc8b6b6e.png',
                'link' => null,
                'screenshot' => null,
                'dibuat_pada' => '2023-08-20',
                'created_at' => now()
            ],
            [
                'judul' => 'TIER MEETING DIGITAL PARKLAND WORLD JEPARA',
                'deskripsi' => 'Sistem digital untuk pemantauan performa dan rapat berkala di PT Parkland World.',
                'kategori' => 'Dashboard',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/47bdc182-4243-4dbc-bcd0-30471426f5a7.png',
                'link' => null,
                'screenshot' => null,
                'dibuat_pada' => '2023-05-30',
                'created_at' => now()
            ],
            [
                'judul' => 'DIGITAL OEE (Overall Equipment Effectivity)',
                'deskripsi' => 'Dashboard untuk memantau efektivitas mesin dan peralatan secara real-time.',
                'kategori' => 'Monitoring System',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/09ade153-14d3-4742-8467-f24a2bc26efc.png',
                'link' => null,
                'screenshot' => null,
                'dibuat_pada' => '2023-06-01',
                'created_at' => now()
            ],
            [
                'judul' => 'TOKCER (Kalkulator Cek Retribusi) Kabupaten Jepara',
                'deskripsi' => 'Aplikasi untuk menghitung estimasi retribusi secara mandiri di Kabupaten Jepara.',
                'kategori' => 'E-Government Tool',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a3b3d14c-acd6-4c5c-bcf9-022edf65c823.png',
                'link' => null,
                'screenshot' => null,
                'dibuat_pada' => '2023-04-20',
                'created_at' => now()
            ],
            [
                'judul' => 'DIGITAL DASHBOARD RETRIBUSI SAMPAH',
                'deskripsi' => 'Sistem visualisasi data untuk pengelolaan retribusi sampah secara digital.',
                'kategori' => 'Environmental Dashboard',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/4480e4f0-8559-48b7-a175-42ae945c0dfe.png',
                'link' => null,
                'screenshot' => null,
                'dibuat_pada' => '2023-06-15',
                'created_at' => now()
            ],
            [
                'judul' => 'DASHBOARD KEUANGAN BUMDES',
                'deskripsi' => 'Dashboard yang menampilkan laporan keuangan BUMDes secara transparan dan akurat.',
                'kategori' => 'Financial Dashboard',
                'gambar' => 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/63443625-fad0-49c9-9ead-e0619f052934.png',
                'link' => null,
                'screenshot' => null,
                'dibuat_pada' => '2023-03-10',
                'created_at' => now()
            ]
        ];

        foreach ($data as $d) {
            portofolioModel::create($d);
        }
    }
}
