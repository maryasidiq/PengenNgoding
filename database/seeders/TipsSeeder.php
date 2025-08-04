<?php

namespace Database\Seeders;

use App\Models\tipsModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama' => 'HTML',
                'judul' => 'Tutorial HTML Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg',
                'short_deskripsi' => 'Belajar HTML dari dasar untuk membuat website dari nol',
                'long_deskripsi' => '<div class="mb-4"><p>Selamat datang di seri tutorial lengkap belajar <strong>HTML dasar</strong> dari nol untuk pemula.</p>
                                    <p>HTML adalah bahasa yang wajib dikuasai untuk membuat sebuah website.</p>
                                    <p>Sangking pentingnya, HTML dan website tidak bisa terpisahkan.</p>
                                    <p>Dalam seri tutorial belajar HTML ini teman-teman akan belajar HTML benar-benar dari paling dasar. Alias nol.</p>
                                    <p>Dan semuanya <strong>gratis!</strong></p>
                                    <p>Dalam tutorial belajar HTML ini, teman-teman juga akan belajar mengenal HTML, mengenal tag yang tersedia dalam HTML, kegunaan masing-masing tag, sampai mencoba membuat sebuah website pribadi.</p>
                                    <p>Tidak berhenti sampai di sini, teman-teman juga akan belajar bagaimana cara meng-onlinekan website yang sudah dibuat.</p>
                                    <p>Sehingga memiliki domain dan bisa diakses orang lain secara online.</p>
                                    <h5 class="mt-4">Untuk siapa tutorial ini?</h5>
                                    <p>Seri tutorial ini sangat cocok untuk teman-teman yang masih pemula dan ingin belajar tentang pemrograman web.</p>
                                    <p>Bahkan tidak punya basic IT sekalipun.</p>
                                    <p>Karena materi HTML yang disiapkan benar-benar khusus untuk pemula, dibungkus dengan penjelasan yang mudah dipahami oleh siapapun.</p>
                                    <p><strong>Pastikan teman-teman mengikuti materi nya satu per satu. Selamat belajar 🙂</strong></p> </div>',
                'kategori' => 'Frontend',
            ],
            [
                'nama' => 'CSS',
                'judul' => 'Tutorial CSS Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg',
                'short_deskripsi' => 'Belajar CSS untuk desain halaman website',
                'long_deskripsi' => null,
                'kategori' => 'Frontend',
            ],
            [
                'nama' => 'Javascript',
                'judul' => 'Tutorial Javascript Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg',
                'short_deskripsi' => 'Interaktivitas website dengan JavaScript',
                'long_deskripsi' => null,
                'kategori' => 'Frontend',
            ],
            [
                'nama' => 'PHP',
                'judul' => 'Tutorial PHP Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg',
                'short_deskripsi' => 'Belajar PHP untuk backend development',
                'long_deskripsi' => null,
                'kategori' => 'Backend',
            ],
            [
                'nama' => 'MySQL',
                'judul' => 'Tutorial MySQL Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg',
                'short_deskripsi' => 'Dasar-dasar pengelolaan database',
                'long_deskripsi' => null,
                'kategori' => 'Backend',
            ],
            [
                'nama' => 'Laravel',
                'judul' => 'Tutorial Laravel Untuk Pemula',
                'gambar' => 'https://raw.githubusercontent.com/PKief/vscode-material-icon-theme/main/icons/laravel.svg',
                'short_deskripsi' => 'Framework PHP modern dan efisien',
                'long_deskripsi' => null,
                'kategori' => 'Backend',
            ],
            [
                'nama' => 'Tailwind CSS',
                'judul' => 'Tutorial Talwind CSS Untuk Pemula',
                'gambar' => 'https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg',
                'short_deskripsi' => 'Desain modern dan utility-first',
                'long_deskripsi' => null,
                'kategori' => 'Frontend',
            ],
            [
                'nama' => 'Python',
                'judul' => 'Tutorial Python Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg',
                'short_deskripsi' => 'Bahasa pemrograman serba guna',
                'long_deskripsi' => null,
                'kategori' => 'Backend',
            ],
            [
                'nama' => 'Java',
                'judul' => 'Tutorial Java Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg',
                'short_deskripsi' => 'Pemrograman desktop & mobile',
                'long_deskripsi' => null,
                'kategori' => 'Backend',
            ],
            [
                'nama' => 'Git',
                'judul' => 'Tutorial Git Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg',
                'short_deskripsi' => 'Version control untuk tim developer',
                'long_deskripsi' => null,
                'kategori' => 'Tools',
            ],
            [
                'nama' => 'React',
                'judul' => 'Tutorial React Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg',
                'short_deskripsi' => 'Library UI untuk web interaktif',
                'long_deskripsi' => null,
                'kategori' => 'Frontend',
            ],
            [
                'nama' => 'Bootstrap',
                'judul' => 'Tutorial Bootstrap Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg',
                'short_deskripsi' => 'Framework CSS cepat & responsif',
                'long_deskripsi' => 'Bootstrap adalah salah satu framework <strong>CSS</strong> yang populer di dunia. Bootstrap menyediakan
                                    banyak komponen UI dan style di dalamnya untuk mempermudah dan mempercepat proses pengembangan aplikasi
                                    web.',
                'kategori' => 'Frontend',
            ],
            [
                'nama' => 'Node.js',
                'judul' => 'Tutorial Node.js Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg',
                'short_deskripsi' => 'Backend development berbasis JS',
                'long_deskripsi' => null,
                'kategori' => 'Backend',
            ],
            [
                'nama' => 'Vue.js',
                'judul' => 'Tutorial Vue.js Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg',
                'short_deskripsi' => 'Framework frontend yang ringan',
                'long_deskripsi' => null,
                'kategori' => 'Frontend',
            ],
            [
                'nama' => 'Angular',
                'judul' => 'Tutorial Angular Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/angularjs/angularjs-original.svg',
                'short_deskripsi' => 'Framework SPA untuk enterprise',
                'long_deskripsi' => null,
                'kategori' => 'Frontend',
            ],
            [
                'nama' => 'SASS',
                'judul' => 'Tutorial SASS Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sass/sass-original.svg',
                'short_deskripsi' => 'Preprocessor untuk CSS yang efisien',
                'long_deskripsi' => null,
                'kategori' => 'Frontend',
            ],
            [
                'nama' => 'TypeScript',
                'judul' => 'Tutorial TypeScript Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg',
                'short_deskripsi' => 'Typed superset dari JavaScript',
                'long_deskripsi' => null,
                'kategori' => 'Frontend',
            ],
            [
                'nama' => 'Figma',
                'judul' => 'Tutorial Figma Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg',
                'short_deskripsi' => 'Desain UI/UX modern & kolaboratif',
                'long_deskripsi' => null,
                'kategori' => 'Tools',
            ],
            [
                'nama' => 'Android',
                'judul' => 'Tutorial Android Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/android/android-original.svg',
                'short_deskripsi' => 'Pengembangan aplikasi Android',
                'long_deskripsi' => null,
                'kategori' => 'Android',
            ],
            [
                'nama' => 'CodeIgniter',
                'judul' => 'Tutorial CodeIgniter Untuk Pemula',
                'gambar' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/codeigniter/codeigniter-plain.svg',
                'short_deskripsi' => 'Belajar framework CodeIgniter yang cepat dan ringan untuk PHP',
                'long_deskripsi' => null,
                'kategori' => 'Backend',
            ],
        ];

        foreach ($data as $d) {
            tipsModel::create($d);
        }
    }
}