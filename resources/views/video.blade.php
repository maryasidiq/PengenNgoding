<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">
  <title>Pengen Ngoding - Video</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Custom scrollbar for pagination */
    .pagination::-webkit-scrollbar {
      height: 8px;
    }

    .pagination::-webkit-scrollbar-thumb {
      background-color: #2c3e72;
      border-radius: 10px;
    }

    /* Tailwind customization */
    .custom-shadow {
      box-shadow: 0 1px 2px rgb(0 0 0 / 0.05);
    }

    /* Text clamp to 3 lines for snippet preview */
    .line-clamp-3 {
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }
  </style>
</head>

<body class="bg-white text-gray-700 font-sans selection:bg-blue-600 selection:text-white">
@include('partials.header')

  <!-- Hero Banner -->
  <section class="relative bg-[#0863A9] text-white pt-24 md:pt-28 pb-12 overflow-visible z-10">
    <div
      class="container max-w-7xl px-6 md:px-8 py-3 flex flex-col-reverse md:flex-row items-center justify-between gap-8 mx-auto">

      <!-- Teks -->
      <div class="max-w-xl z-20 text-center md:text-left">
        <h1 class="font-semibold text-4xl md:text-5xl leading-tight mb-4">VIDEO</h1>
        <h1 class="font-semibold text-4xl md:text-5xl leading-tight mb-4">PENGEN NGODING</h1>
        <p class="text-white/90 mb-6 max-w-lg text-base md:text-lg mx-auto md:mx-0">
          Mari Belajar Bersama Kami Dan Wujudkan Kebutuhan Aplikasi Anda.
        </p>
        <button class="bg-white text-blue-800 text-xs rounded-md font-semibold px-4 py-2 hover:bg-blue-100 transition">
          Ayo Belajar
        </button>
      </div>

      <!-- Ilustrasi -->
      <div class="relative w-full 
    max-w-[220px] sm:max-w-[260px] md:max-w-[300px] lg:max-w-[340px] 
    z-10 mb-6 md:-mb-28 mx-auto 
    sm:translate-x-0 md:translate-x-[40px] lg:translate-x-[70px]
    md:pr-6">
        <img src="{{ url('/') }}/images/human.png" alt="Ilustrasi developer" class="w-full h-auto object-contain select-none" />
      </div>

    </div>
  </section>


  <main class="px-6 md:px-8 container max-w-7xl mx-auto mt-12 pb-16">

    <!-- Article Categories -->
    <section class="mb-14">
      <h1 class="text-lg md:text-3xl font-bold text-gray-[#124C76] mb-1">Mau belajar apa hari ini?</h2>
        <p class="text-gray-600 mb-6 text-sm md:text-base max-w-xl">Temukan video berdasarkan minatmu.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Card 1 -->
          <a href="#" class="block">
            <article tabindex="0" role="article" aria-label="Basic Programming"
              class="flex items-center gap-4 rounded-lg bg-gray-100 p-5 cursor-pointer hover:bg-gray-200 transition-shadow custom-shadow focus:ring-2 focus:ring-blue-500 focus:outline-none">
              <div class="flex-shrink-0 w-16 h-16 rounded-md overflow-hidden">
                <img src="{{ url('/') }}/images/basic_programing.png" alt="Basic Programming Icon"
                  class="w-full h-full object-cover" />
              </div>
              <div class="flex flex-col text-sm md:text-base flex-grow">
                <h3 class="font-semibold text-gray-900 mb-1">Basic Programming</h3>
                <p class="text-gray-700 line-clamp-3">Baca tutorial dasar-dasar pemrograman menggunakan C, C++, C#,
                  Java,
                  Javascript, dan masih banyak lagi.</p>
              </div>
              <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
              </svg>
            </article>
          </a>

          <!-- Card 2 -->
          <a href="#" class="block">
            <article tabindex="0" role="article" aria-label="Web Programming"
              class="flex items-center gap-4 rounded-lg bg-gray-100 p-5 cursor-pointer hover:bg-gray-200 transition-shadow custom-shadow focus:ring-2 focus:ring-blue-500 focus:outline-none">
              <div class="flex-shrink-0 w-16 h-16 rounded-md overflow-hidden">
                <img src="{{ url('/') }}/images/web_programing.png" alt="Basic Programming Icon" class="w-full h-full object-cover" />
                <path d="M2 2h20v20H2z" fill="none" />
                <path d="M9 21v-6h-3v6H2L12 2l10 19h-6z" />
                </svg>
              </div>
              <div class="flex flex-col text-sm md:text-base flex-grow">
                <h3 class="font-semibold text-gray-900 mb-1">Web Programming</h3>
                <p class="text-gray-700 line-clamp-3">
                  Baca tutorial cara membuat web. Mulai dari HTML, CSS, JS, PHP, MySQL, CodeIgniter, React, dan masih
                  banyak lagi.
                </p>
              </div>
              <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
              </svg>
            </article>
          </a>

          <!-- Card 3 -->
          <a href="{{ route('video/1') }}" class="block">
            <article tabindex="0" role="article" aria-label="Tutorial Lainnya"
              class="flex items-center gap-4 rounded-lg bg-gray-100 p-5 cursor-pointer hover:bg-gray-200 transition-shadow custom-shadow focus:ring-2 focus:ring-blue-500 focus:outline-none">
              <div class="flex-shrink-0 w-16 h-16 rounded-md overflow-hidden">
                <img src="{{ url('/') }}/images/tutorial_lainnya.png" alt="Basic Programming Icon"
                  class="w-full h-full object-cover" />
                <path d="M7 2a5 5 0 00-5 5v10a5 5 0 005 5h10a5 5 0 005-5V7a5 5 0 00-5-5H7z" />
                </svg>
              </div>
              <div class="flex flex-col text-sm md:text-base flex-grow">
                <h3 class="font-semibold text-gray-900 mb-1">Tutorial Lainnya</h3>
                <p class="text-gray-700 line-clamp-3">
                  Baca tutorial dalam kategori lainnya seperti Mobile programming, Game programming, IoT, Blockchain,
                  dan
                  masih banyak lagi.
                </p>
              </div>
              <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
              </svg>
            </article>
          </a>
        </div>
    </section>

    <!-- Latest Articles Section -->
    <!-- Section Header -->
    <section class="max-w-7xl mx-auto">
      <header class="mb-6">
        <p class="text-sm font-semibold text-blue-700 mb-2">UPDATE</p>
        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
          Apa yang baru di Pengenngoding? 🔥
          <!-- <img src="https://cdn-icons-png.flaticon.com/512/833/833472.png" alt="Fire Icon" class="w-6 h-6" /> -->
        </h2>
        <p class="text-gray-600 text-sm md:text-base mt-1 max-w-xl">
          Video terbaru yang masih fresh dan hangat.
        </p>
      </header>

      <!-- Article Container -->
      <div id="articleContainer" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <!-- Article cards will be rendered here via JavaScript -->
      </div>

      <!-- Pagination -->
      <nav aria-label="Pagination" class="flex justify-center mt-6">
        <ul class="inline-flex space-x-1 text-sm font-semibold pagination">
          <li>
            <button id="prevPage"
              class="w-8 h-8 rounded border border-blue-700 text-blue-700 hover:bg-blue-100 focus:ring-2 focus:ring-blue-500">
              «
            </button>
          </li>
          <!-- Page number buttons generated by JS -->
          <li id="pageButtons" class="flex space-x-1"></li>
          <li>
            <button id="nextPage"
              class="w-8 h-8 rounded border border-blue-700 text-blue-700 hover:bg-blue-100 focus:ring-2 focus:ring-blue-500">
              »
            </button>
          </li>
        </ul>
      </nav>
      <!-- Lihat Selengkapnya Button -->
      <div class="flex justify-center mt-8">
        <a href="#"
          class="inline-block px-4 py-2 rounded bg-blue-700 text-white hover:bg-blue-800 text-sm font-semibold transition">
          Lihat Semua Video →
        </a>
      </div>
    </section>

    <section class="mt-24 mb-20">
      <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-8 text-center">Video Belajar Pemrograman Lengkap</h2>
      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8">

        <!-- HTML -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-orange-200 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" alt="HTML Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">HTML</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Belajar HTML dari dasar untuk membuat website dari nol</p>
        </article>

        <!-- CSS -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-blue-200 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" alt="CSS Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">CSS</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Belajar CSS untuk desain halaman website</p>
        </article>

        <!-- Javascript -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-yellow-300 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg"
              alt="JS Icon" class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Javascript</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Interaktivitas website dengan JavaScript</p>
        </article>

        <!-- PHP -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-purple-300 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" alt="PHP Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">PHP</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Belajar PHP untuk backend development</p>
        </article>

        <!-- MySQL -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-yellow-100 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">MySQL</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Dasar-dasar pengelolaan database</p>
        </article>

        <!-- Laravel -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-pink-100 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://raw.githubusercontent.com/PKief/vscode-material-icon-theme/main/icons/laravel.svg"
              alt="Laravel Icon" class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Laravel</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Framework PHP modern dan efisien</p>
        </article>

        <!-- Tailwind CSS -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-gray-100 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://www.vectorlogo.zone/logos/tailwindcss/tailwindcss-icon.svg" alt="Tailwind Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Tailwind CSS</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Desain modern dan utility-first</p>
        </article>

        <!-- Python -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-blue-200 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg" alt="Python Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Python</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Bahasa pemrograman serba guna</p>
        </article>

        <!-- Java -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-orange-100 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" alt="Java Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Java</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Pemrograman desktop & mobile</p>
        </article>

        <!-- Git -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-gray-800 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg" alt="Git Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Git</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Version control untuk tim developer</p>
        </article>

        <!-- React -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-gray-800 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg" alt="React Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">React</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Library UI untuk web interaktif</p>
        </article>

        <!-- Bootstrap -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-purple-200 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg"
              alt="Bootstrap Icon" class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Bootstrap</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Framework CSS cepat & responsif</p>
        </article>

        <!-- Node.js -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-green-300 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg" alt="Node Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Node.js</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Backend development berbasis JS</p>
        </article>

        <!-- Vue.js -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-green-200 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg" alt="Vue Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Vue.js</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Framework frontend yang ringan</p>
        </article>

        <!-- Angular -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-red-200 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/angularjs/angularjs-original.svg"
              alt="Angular Icon" class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Angular</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Framework SPA untuk enterprise</p>
        </article>

        <!-- SASS -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-pink-200 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sass/sass-original.svg" alt="Sass Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">SASS</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Preprocessor untuk CSS yang efisien</p>
        </article>

        <!-- TypeScript -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-blue-400 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg"
              alt="TS Icon" class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">TypeScript</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Typed superset dari JavaScript</p>
        </article>

        <!-- Figma -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-indigo-200 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" alt="Figma Icon"
              class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Figma</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Desain UI/UX modern & kolaboratif</p>
        </article>

        <!-- Android -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <a href="#" class="w-16 h-16 rounded-md bg-green-400 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/android/android-original.svg"
              alt="Android Icon" class="w-8 h-8 select-none">
          </a>
          <a href="#" class="text-sm font-semibold text-gray-900 mb-1 hover:underline">Android</a>
          <p class="text-gray-600 text-xs max-w-[110px]">Pengembangan aplikasi Android</p>
        </article>

        <!-- ci -->
        <article class="flex flex-col items-center text-center hover:scale-110 transition">
          <div class="w-16 h-16 rounded-md bg-red-300 mb-3 flex items-center justify-center drop-shadow">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/codeigniter/codeigniter-plain.svg"
              alt="Icon CodeIgniter merah dengan tulisan CodeIgniter" class="select-none w-8 h-8"
              onerror="this.onerror=null;this.src='https://placehold.co/48x48?text=CI';">
          </div>
          <h3 class="text-sm font-semibold text-gray-900 mb-1">CodeIgniter</h3>
          <p class="text-gray-600 text-xs max-w-[110px]">Belajar framework CodeIgniter yang cepat dan ringan untuk PHP
          </p>
        </article>

      </div>
    </section>

  </main>

  <!-- Footer -->
  @include('partials.footer')

</body>
<!-- JavaScript Logic -->
<script>
  const articles = [
    {
      title: "Tutorial Laravel 11 untuk Pemula: Langsung Bisa bikin CRUD!",
      desc: "Tutorial Laravel 11 cocok untuk pemula disertai latihan membuat CRUD dari awal.",
      image: "https://placehold.co/600x400/ff4d4d/fff?text=Laravel",
      link: "#",
      // link: "artikel/1",
    },
    {
      title: "Tutorial Membuat Sistem Notifikasi dengan Redis Pub/Sub di Golang",
      desc: "Step-by-step cara membuat sistem notifikasi secara realtime dengan Redis Pub/Sub di Golang.",
      image: "https://placehold.co/600x400/00bfff/fff?text=Golang+Redis",
      link: "#",
    },
    {
      title: "Belajar C++ #13: Mengenal Tipe Data Union",
      desc: "Apa itu union di C++? Mengapa kita butuh dan apa bedanya dengan struct?",
      image: "https://placehold.co/600x400/1e3a8a/fff?text=Union+C++",
      link: "#",
    },
    {
      title: "Belajar C++ #12: Mengenal Tipe Data Struct",
      desc: "Pada tutorial ini, kita akan berkenalan dengan tipe data struct dan cara menggunakannya.",
      image: "https://placehold.co/600x400/4f46e5/fff?text=Struct+C++",
      link: "#",
    },
    {
      title: "Belajar C++ #11: Tipe Data Enum di C++",
      desc: "Membahas enum di C++, mulai dari definisi, cara membuat, dan penggunaannya.",
      image: "https://placehold.co/600x400/3b82f6/fff?text=Enum+C++",
      link: "#",
    },
    {
      title: "Belajar C++ #14: Memahami Pointer di C++",
      desc: "Apa itu pointer dan bagaimana cara kerjanya di C++? Simak tutorial ini.",
      image: "https://placehold.co/600x400/6366f1/fff?text=Pointer+C++",
      link: "#",
    },
    {
      title: "Belajar Git Dasar: Commit, Branch, dan Merge",
      desc: "Panduan singkat memahami dasar penggunaan Git yang sering digunakan saat ngoding bareng.",
      image: "https://placehold.co/600x400/10b981/fff?text=Git+Dasar",
      link: "#",
    },
    {
      title: "Mengenal React useEffect untuk Pemula",
      desc: "Tutorial lengkap memahami hook useEffect dalam React dan kapan sebaiknya digunakan.",
      image: "https://placehold.co/600x400/f59e0b/fff?text=React+useEffect",
      link: "#",
    },
    {
      title: "Memulai Pemrograman Python dari Nol",
      desc: "Langkah-langkah awal belajar Python untuk pemula beserta contoh-contohnya.",
      image: "https://placehold.co/600x400/0ea5e9/fff?text=Python+Dasar",
      link: "#",
    },
    {
      title: "Membuat Web Portofolio Pribadi dengan HTML & CSS",
      desc: "Bangun personal branding kamu lewat portofolio keren buatan sendiri.",
      image: "https://placehold.co/600x400/f43f5e/fff?text=Portofolio+Web",
      link: "#",
    },
  ];

  const perPage = 6;
  let currentPage = 1;
  const totalPages = Math.ceil(articles.length / perPage);
  const articleContainer = document.getElementById("articleContainer");
  const pageButtonsWrapper = document.getElementById("pageButtons");
  const prevButton = document.getElementById("prevPage");
  const nextButton = document.getElementById("nextPage");

  function renderArticles() {
    articleContainer.innerHTML = "";
    const start = (currentPage - 1) * perPage;
    const selected = articles.slice(start, start + perPage);

    selected.forEach(article => {
      const card = document.createElement("a");
      card.href = article.link;
      card.className = "rounded-lg border border-gray-200 overflow-hidden shadow hover:shadow-md transition block";

      card.innerHTML = `
      <img src="${article.image}" class="w-full h-48 object-cover" alt="${article.title}">
      <div class="p-4 flex flex-col gap-2">
        <h3 class="text-sm font-semibold text-gray-800">${article.title}</h3>
        <p class="text-sm text-gray-600">${article.desc}</p>
      </div>`;

      articleContainer.appendChild(card);
    });
  }

  function renderPagination() {
    pageButtonsWrapper.innerHTML = "";
    for (let i = 1; i <= totalPages; i++) {
      const btn = document.createElement("button");
      btn.className = "w-8 h-8 rounded border border-blue-700 text-blue-700 hover:bg-blue-100";
      if (i === currentPage) {
        btn.classList.add("bg-blue-900", "text-white");
      }
      btn.textContent = i;
      btn.addEventListener("click", () => {
        currentPage = i;
        renderArticles();
        renderPagination();
      });
      pageButtonsWrapper.appendChild(btn);
    }

    prevButton.disabled = currentPage === 1;
    nextButton.disabled = currentPage === totalPages;
  }

  prevButton.addEventListener("click", () => {
    if (currentPage > 1) {
      currentPage--;
      renderArticles();
      renderPagination();
    }
  });

  nextButton.addEventListener("click", () => {
    if (currentPage < totalPages) {
      currentPage++;
      renderArticles();
      renderPagination();
    }
  });

  // Initial render
  renderArticles();
  renderPagination();
</script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</html>