<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">
  <title>Pengen Ngoding - Artikel</title>
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


  <!-- Header / Navbar -->
  @include('partials.header')


  <!-- Hero Banner -->
  <section class="relative bg-[#0863A9] text-white pt-24 md:pt-28 pb-12 overflow-visible z-10">
    <div
      class="container max-w-7xl px-6 md:px-8 py-3 flex flex-col-reverse md:flex-row items-center justify-between gap-8 mx-auto">

      <!-- Teks -->
      <div class="max-w-xl z-20 text-center md:text-left">
        <h1 class="font-semibold text-4xl md:text-5xl leading-tight mb-4">ARTIKEL</h1>
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
        <img src="{{ url('/') }}/images/human.png" alt="Ilustrasi developer"
          class="w-full h-auto object-contain select-none" />
      </div>

    </div>
  </section>


  <main class="px-6 md:px-8 container max-w-7xl mx-auto mt-12 pb-16">

    <!-- Article Categories -->
    <section class="mb-14">
      <h1 class="text-lg md:text-3xl font-bold text-gray-[#124C76] mb-1">Mau belajar apa hari ini?</h2>
        <p class="text-gray-600 mb-6 text-sm md:text-base max-w-xl">Temukan artikel berdasarkan minatmu.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Card 1 - Frontend -->
          <a href="{{ route('artikel.kategori.konten', 'frontend') }}" class="block">
            <article tabindex="0" role="article" aria-label="Frontend Programming"
              class="flex items-center gap-4 rounded-lg bg-gray-100 p-5 cursor-pointer hover:bg-gray-200 transition-shadow custom-shadow focus:ring-2 focus:ring-blue-500 focus:outline-none">
              <div class="flex-shrink-0 w-16 h-16 rounded-md overflow-hidden">
                <img src="{{ url('/') }}/images/basic_programing.png" alt="Frontend Icon"
                  class="w-full h-full object-cover" />
              </div>
              <div class="flex flex-col text-sm md:text-base flex-grow">
                <h3 class="font-semibold text-gray-900 mb-1">Frontend</h3>
                <p class="text-gray-700 line-clamp-3">
                  Baca tutorial frontend development seperti HTML, CSS, JavaScript, React, dan teknologi tampilan web
                  lainnya.
                </p>
              </div>
              <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
              </svg>
            </article>
          </a>

          <!-- Card 2 - Android -->
          <a href="{{ route('artikel.kategori.konten', 'backend') }}" class="block">
            <article tabindex="0" role="article" aria-label="Android Programming"
              class="flex items-center gap-4 rounded-lg bg-gray-100 p-5 cursor-pointer hover:bg-gray-200 transition-shadow custom-shadow focus:ring-2 focus:ring-blue-500 focus:outline-none">
              <div class="flex-shrink-0 w-16 h-16 rounded-md overflow-hidden">
                <img src="{{ url('/') }}/images/web_programing.png" alt="Android Icon"
                  class="w-full h-full object-cover" />
              </div>
              <div class="flex flex-col text-sm md:text-base flex-grow">
                <h3 class="font-semibold text-gray-900 mb-1">Backend</h3>
                <p class="text-gray-700 line-clamp-3">
                  Pelajari cara membuat backend dengan PHP, MySQL, Java, Python dan tools lainnya.
                </p>
              </div>
              <svg class="w-5 h-5 text-gray-400 shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
              </svg>
            </article>
          </a>

          <!-- Card 3 -->
          <a href="{{ route('artikel.kategori') }}" class="block">
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
          Artikel Terbaru 🔥
          <!-- <img src="https://cdn-icons-png.flaticon.com/512/833/833472.png" alt="Fire Icon" class="w-6 h-6" /> -->
        </h2>
        <p class="text-gray-600 text-sm md:text-base mt-1 max-w-xl">
          Baca konten-konten terbaru dari tim Pengen Ngoding.
        </p>
      </header>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($kontenTerbaru as $konten)
          <div class="rounded-lg border border-gray-200 overflow-hidden shadow hover:shadow-md transition block relative">
            <a href="{{ route('artikel.bab', ['id' => $konten->artikel->id, 'bab_id' => $konten->id]) }}">
              <img
                src="{{ filter_var($konten->gambar, FILTER_VALIDATE_URL) ? $konten->gambar : asset('storage/' . $konten->gambar) }}"
                class="w-full h-48 object-cover" alt="{{ $konten->artikel->nama }}">
              <div class="p-4 flex flex-col gap-2">
                <h3 class="text-sm font-semibold text-gray-800">
                  {{ $konten->artikel->judul }} - {{ $konten->judul }}
                </h3>
                <p class="text-sm text-gray-600">
                  {{ Str::limit(strip_tags($konten->deskripsi), 100) }}
                </p>
              </div>
            </a>

            @auth
              <div class="absolute top-2 right-2 flex items-center space-x-1">
                <a href="{{ route('admin.artikel.konten.edit', ['artikel' => $konten->artikel->id, 'konten' => $konten->id]) }}"
                  class="bg-black hover:bg-yellow-600 text-white px-3 py-1 rounded-full text-xs flex items-center space-x-1 shadow transition">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414 
                                                   a2 2 0 112.828 2.828L11.828 15H9v-2.828 
                                                   l8.586-8.586z" />
                  </svg>
                  <span>Edit</span>
                </a>
              </div>
            @endauth
          </div>
        @endforeach
      </div>



      <!-- Pagination -->
      <nav aria-label="Pagination" class="flex justify-center mt-6">
        @if ($kontenTerbaru->hasPages())
          <ul class="inline-flex space-x-1 text-sm font-semibold pagination">

            {{-- Tombol Previous --}}
            <li>
              <a href="{{ $kontenTerbaru->previousPageUrl() ?? '#' }}"
                class="w-8 h-8 flex items-center justify-center rounded border border-blue-700 text-blue-700 hover:bg-blue-100 focus:ring-2 focus:ring-blue-500 {{ $kontenTerbaru->onFirstPage() ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}">
                «
              </a>
            </li>

            {{-- Tombol Halaman --}}
            @foreach ($kontenTerbaru->getUrlRange(1, $kontenTerbaru->lastPage()) as $page => $url)
              <li>
                <a href="{{ $url }}"
                  class="w-8 h-8 flex items-center justify-center rounded border border-blue-700
                                                                      {{ $kontenTerbaru->currentPage() == $page ? 'bg-blue-900 text-white' : 'text-blue-700 hover:bg-blue-100' }}">
                  {{ $page }}
                </a>
              </li>
            @endforeach

            {{-- Tombol Next --}}
            <li>
              <a href="{{ $kontenTerbaru->nextPageUrl() ?? '#' }}"
                class="w-8 h-8 flex items-center justify-center rounded border border-blue-700 text-blue-700 hover:bg-blue-100 focus:ring-2 focus:ring-blue-500 {{ !$kontenTerbaru->hasMorePages() ? 'opacity-50 cursor-not-allowed pointer-events-none' : '' }}">
                »
              </a>
            </li>

          </ul>
        @endif
      </nav>

      <!-- Lihat Selengkapnya Button -->
      <div class="flex justify-center mt-8">
        <a href="{{ route('artikel.kategori') }}"
          class="inline-block px-4 py-2 rounded bg-blue-700 text-white hover:bg-blue-800 text-sm font-semibold transition">
          Lihat Semua Artikel →
        </a>

      </div>

    </section>


    <section class="mt-24 mb-20">
      <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-20 text-center">
        Artikel Belajar Pemrograman Lengkap
      </h2>

      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-8">
        @foreach ($artikels as $artikel)
          <article class="flex flex-col items-center text-center hover:scale-110 transition">
            <a href="{{ route('artikel.detail', ['id' => $artikel->id]) }}"
              class="mb-3 flex items-center justify-center drop-shadow">
              <img
                src="{{ filter_var($artikel->gambar, FILTER_VALIDATE_URL) ? $artikel->gambar : asset('storage/' . $artikel->gambar) }}"
                alt="{{ $artikel->nama }} Icon" class="w-12 h-12 select-none">
            </a>
            <a href="{{ route('artikel.detail', ['id' => $artikel->id]) }}"
              class="text-sm font-semibold text-gray-900 mb-1 hover:underline">
              {{ $artikel->nama }}
            </a>

            <a href="{{ route('artikel.detail', ['id' => $artikel->id]) }}" class="text-gray-600 text-xs max-w-[110px]">
              {!! $artikel->short_deskripsi !!}
            </a>

            {{-- Tombol Edit (hanya muncul kalau login) --}}
            @auth
              <a href="{{ route('admin.artikel.edit', $artikel->id) }}"
                class="mt-2 inline-flex items-center px-3 py-1 bg-black hover:bg-yellow-600 text-white text-xs font-medium rounded-full shadow transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414 
                             a2 2 0 112.828 2.828L11.828 15H9v-2.828 
                             l8.586-8.586z" />
                </svg>
                Edit
              </a>
            @endauth
          </article>
        @endforeach
      </div>

    </section>



  </main>

  <!-- footer -->
  @include('partials.footer')


</body>
<!-- JavaScript Logic -->
<script>


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