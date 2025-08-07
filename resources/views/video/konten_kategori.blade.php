<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">
  <title>Pengen Ngoding - Konten</title>
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
  <!-- <section class="relative  text-white pt-24 md:pt-28 pb-12 overflow-visible z-10">

  </section> -->
  <main class="px-6 md:px-8 container max-w-7xl mx-auto pt-24 md:pt-28 pb-12">
    <section class="max-w-7xl mx-auto">
      <header class="mb-6">
        <p class="text-sm font-semibold text-blue-700 mb-2">video</p>
        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
          Kategori: {{ $kategori }}
        </h2>
        <p class="text-gray-600 text-sm md:text-base mt-1 max-w-xl">
          Ditemukan {{ $konten->total() }} video dalam kategori <span class="font-semibold">{{ $kategori }}</span>.
        </p>
        <a href="{{ route('video.kategori') }}" class="inline-block mt-4 text-blue-600 hover:underline text-sm">
          ← Kembali ke Semua video
        </a>

      </header>

      <!-- Ar cle Container -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        @forelse ($konten as $item)
      <a href="{{ route('video.bab', ['id' => $item->video_id, 'bab_id' => $item->id]) }}"
        class="rounded-lg border border-gray-200 overflow-hidden shadow hover:shadow-md transition block">
        <img src="{{ asset($item->gambar) }}" class="w-full h-48 object-cover" alt="{{ $item->video->judul }}">
        <div class="p-4 flex flex-col gap-2">
        <h3 class="text-sm font-semibold text-gray-800">
          {{ $item->video->judul }} - {{ $item->judul }}
        </h3>
        <p class="text-sm text-gray-600 line-clamp-3">
          {{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 100) }}
        </p>
        </div>
      </a>
    @empty
      <p class="text-gray-500 col-span-full text-center">Tidak ada konten pada kategori ini.</p>
    @endforelse
      </div>

      <!-- Hidden Values for JS -->
      <input type="hidden" id="totalPages" value="{{ $konten->lastPage() }}">
      <input type="hidden" id="currentPage" value="{{ $konten->currentPage() }}">

      <!-- Custom Pagination -->
      <nav aria-label="Pagination" class="flex justify-center mt-6">
        <ul class="inline-flex space-x-1 text-sm font-semibold pagination">
          <li>
            <button id="prevPage"
              class="w-8 h-8 rounded border border-blue-700 text-blue-700 hover:bg-blue-100 focus:ring-2 focus:ring-blue-500">
              «
            </button>
          </li>
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
      <!-- <div class="flex justify-center mt-8">
        <a href="#"
          class="inline-block px-4 py-2 rounded bg-blue-700 text-white hover:bg-blue-800 text-sm font-semibold transition">
          Lihat Semua Artikel →
        </a>
      </div> -->

    </section>



  </main>

  <!-- footer -->
  @include('partials.footer')


</body>
<!-- JavaScript Logic -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const totalPages = parseInt(document.getElementById("totalPages").value);
    let currentPage = parseInt(document.getElementById("currentPage").value);

    const pageButtonsContainer = document.getElementById("pageButtons");
    const prevButton = document.getElementById("prevPage");
    const nextButton = document.getElementById("nextPage");

    function renderButtons() {
      pageButtonsContainer.innerHTML = "";

      for (let i = 1; i <= totalPages; i++) {
        const btn = document.createElement("a");
        btn.href = `?page=${i}`;
        btn.textContent = i;
        btn.className = "w-8 h-8 flex items-center justify-center rounded border border-blue-700 hover:bg-blue-100" +
          (i === currentPage ? " bg-blue-700 text-white" : " text-blue-700");
        pageButtonsContainer.appendChild(btn);
      }

      prevButton.disabled = currentPage === 1;
      nextButton.disabled = currentPage === totalPages;
    }

    prevButton.addEventListener("click", () => {
      if (currentPage > 1) {
        window.location.href = `?page=${currentPage - 1}`;
      }
    });

    nextButton.addEventListener("click", () => {
      if (currentPage < totalPages) {
        window.location.href = `?page=${currentPage + 1}`;
      }
    });

    renderButtons();
  });
</script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</html>