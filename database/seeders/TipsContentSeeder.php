<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tipsContentModel;


class TipsContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        $data = [
            [
                'tips_id' => '12',
                'judul' => 'Tutorial Bootstrap #1 : Pengertian dan Cara Menggunakan Bootstrap',
                'gambar' => 'images/bootstrap.png',
                'deskripsi' => '<div class="bg-purple-700 rounded-lg p-6 mb-6 flex justify-center items-center">
                <img src="https://placehold.co/600x350/purple/ffffff?text=Bootstrap+Pengertian+Bootstrap"
                    alt="Ilustrasi layar komputer bertuliskan Bootstrap dengan latar belakang ungu gelap dan teks putih"
                    class="max-w-full h-auto rounded" />
            </div>

            <section class="mb-8">
                <h2 class="font-semibold text-lg mb-2">Pengertian Dan Cara Menggunakan Bootstrap</h2>
                <p class="mb-4 text-sm md:text-base leading-relaxed text-gray-700">
                    Bootstrap adalah framework css dan javascript open source yang paling banyak dibutuhkan untuk
                    mempercepat proses dalam pembuatan website.
                    Bootstrap berisi kumpulan template desain yang siap pakai yang dibuat oleh @fat dan @mdo.
                </p>
                <p class="mb-4 text-gray-700 text-sm md:text-base leading-relaxed">
                    Bootstrap didirikan pada tahun 2010 dan terbuka untuk umum, sekarang digunakan oleh jutaan website.
                    Bootstrap mengandung css dasar dan komponen siap pakai
                    yang membantu developer mempercepat proses pembuatan halaman web yang dinamis dan responsif.
                </p>
                <p class="mb-4 text-gray-700 text-sm md:text-base leading-relaxed">
                    Bootstrap merupakan framework yang menggunakan css dan javascript untuk membantu developer membuat
                    website dengan desain yang menarik dan fungsionalitas lengkap.
                    Contohnya, Bootstrap menyediakan tombol, form, navigasi, layout grid, dan komponen user interface
                    lain yang bisa langsung kita gunakan.
                </p>
            </section>

            <section class="mb-8">
                <h2 class="font-semibold text-lg mb-4">Cara Menggunakan Bootstrap</h2>

                <div class="bg-purple-700 rounded-lg p-6 mb-6 text-center text-white">
                    <img src="https://placehold.co/600x250/purple/ffffff?text=Contoh+Tampilan+Bootstrap"
                        alt="Contoh tampilan website dengan Bootstrap warna ungu dan tulisan putih di tengah layar"
                        class="mx-auto my-3 max-w-full h-auto rounded" />
                    <p class="text-sm">Bootstrap quickly and easily scales your websites using a responsive grid system
                        and prebuilt components.</p>
                </div>

                <p class="text-gray-700 mb-3 text-sm md:text-base">
                    Berikut contoh penggunaan Bootstrap dalam file HTML:
                </p>

                <pre class="code-block">
&lt;!DOCTYPE html&gt;
&lt;html lang="en"&gt;
&lt;head&gt;
  &lt;meta charset="UTF-8"&gt;
  &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
  &lt;title&gt;Bootstrap Example&lt;/title&gt;
  &lt;link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"&gt;
&lt;/head&gt;
&lt;body&gt;

  &lt;div class="container"&gt;
    &lt;h1&gt;Hello, Bootstrap!&lt;/h1&gt;
    &lt;button class="btn btn-primary"&gt;Click Me&lt;/button&gt;
  &lt;/div&gt;

  &lt;script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"&gt;&lt;/script&gt;
&lt;/body&gt;
&lt;/html&gt;
      </pre>
            </section>

            <section class="mb-8">
                <h3 class="font-semibold text-md mb-2">Cara Menginstal Bootstrap</h3>
                <p class="mb-3 text-gray-700 text-sm md:text-base">Untuk menginstall Bootstrap, cukup tambahkan link CDN
                    berikut ke dalam tag &lt;head&gt; di file HTML Anda:</p>
                <pre class="code-block">
&lt;link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"&gt;
      </pre>
                <p class="mb-3 text-gray-700 text-sm md:text-base">Dan tambahkan link javascript sebelum tutup tag
                    &lt;/body&gt; :</p>
                <pre class="code-block">
&lt;script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"&gt;&lt;/script&gt;
      </pre>
            </section>

            <section class="mb-8">
                <h3 class="font-semibold text-md mb-2">Cara Menginstal Bootstrap Secara Online</h3>
                <p class="mb-3 text-gray-700 text-sm md:text-base">
                    Anda bisa langsung menyertakan CDN Bootstrap di dokumen HTML tanpa harus mengunduh file Bootstrap.
                </p>
                <pre class="code-block">
&lt;!-- Tambahkan ini di &lt;head&gt; --&gt;
&lt;link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"&gt;
      </pre>
            </section>

            <section class="mb-8">
                <h3 class="font-semibold text-md mb-2">Cara Menginstal Bootstrap Secara Offline</h3>
                <p class="mb-3 text-gray-700 text-sm md:text-base">
                    Anda dapat mengunduh file Bootstrap dan menggunakannya secara lokal:
                </p>
                <div class="flex space-x-4 mb-4 overflow-x-auto"
                    aria-label="Folder structure bootstrap offline example">
                    <img src="https://placehold.co/70x70/ddd/000000?text=css"
                        alt="Folder icon labeled css for bootstrap offline files" class="border rounded" />
                    <img src="https://placehold.co/70x70/ddd/000000?text=js"
                        alt="Folder icon labeled js for bootstrap offline files" class="border rounded" />
                    <img src="https://placehold.co/70x70/ddd/000000?text=fonts"
                        alt="Folder icon labeled fonts folder for bootstrap offline usage" class="border rounded" />
                </div>

                <p class="mb-3 text-gray-700 text-sm md:text-base">
                    Kemudian tautkan stylesheet dan script dalam proyek Anda:
                </p>

                <pre class="code-block">
&lt;link href="css/bootstrap.min.css" rel="stylesheet"&gt;
&lt;script src="js/bootstrap.bundle.min.js"&gt;&lt;/script&gt;
      </pre>
            </section>',
            ],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #2 : Membuat Table Dengan Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #3 : Menampilkan Gambar Dengan Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #4 : Membuat Link / Tombol Dengan Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #5 : Jumbotron Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #6 : Notifikasi Alert Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #7 : Icon Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #8 : Pagination & Breadcrumb Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #9 : List Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #10 : Panel Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #11 : Navigasi Tabs dan Pills Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #12 : Menu Navigasi Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #13 : Form Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #14 : Carousel Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #15 : Modal Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
            ['tips_id' => '12', 'judul' => 'Tutorial Bootstrap #16 : Grid System Bootstrap', 'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg'],
        ];

        foreach ($data as $item) {
            tipsContentModel::create($item);
        }
    }
}
