<!DOCTYPE html>
<html lang="id">
<link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PengenNgoding - Portofolio</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom fonts and icons from Heroicons used inline SVG */
        /* For carousel dots */
        .carousel-dots button {
            width: 0.75rem;
            height: 0.75rem;
            border-radius: 9999px;
            background-color: #ccc;
            margin: 0 0.25rem;
            border: none;
            outline-offset: 2px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .carousel-dots button.active {
            background-color: #4F46E5;
            /* Indigo-600 */
        }

        /*swiper*/
        .swiper-pagination {
            margin-top: 1.5rem;
            /* Jarak ke bawah */
            position: relative;
            z-index: 10;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-white font-sans text-gray-700 leading-relaxed">

    <!-- Header / Navbar -->
    @include('partials.header')

    <!-- Main Portfolio Section -->
    <main class="container max-w-7xl mx-auto px-4 py-10">
        <section id="portfolio" aria-label="Portfolio Projects"
            class="pt-24 scroll-mt-24 grid gap-6 sm:grid-cols-2 md:grid-cols-3">
            <!-- 1 -->
            @foreach ($portofolios as $portofolio)
                <div
                    class="relative bg-white rounded-md overflow-hidden shadow-sm hover:shadow-lg transition hover:scale-105">
                    <a href="{{ route('portofolio.show', $portofolio->id) }}">
                        <img src="{{ filter_var($portofolio->gambar, FILTER_VALIDATE_URL) ? $portofolio->gambar : asset('storage/' . $portofolio->gambar) }}"
                            alt="{{ $portofolio->judul }}" class="w-full h-48 object-cover">
                        <div class="px-4 py-3">
                            <h3 class="text-sm font-semibold text-gray-900 mb-1">{{ $portofolio->judul }}</h3>
                        </div>
                    </a>

                    {{-- Tombol Edit untuk Admin --}}
                    @auth
                        <div class="absolute top-1 right-1 z-10">
                            <a href="/admin/portofolio/{{ $portofolio->id ?? '' }}/edit"
                                class="bg-black hover:bg-yellow-600 text-white p-1.5 rounded-full shadow-md flex items-center justify-center transition duration-200"
                                title="Edit Portofolio">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </div>
                    @endauth
                </div>
            @endforeach

        </section>

    </main>

    <!-- Footer -->
    @include('partials.footer')
</body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</html>