<!DOCTYPE html>
<html lang="id">
<link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/css/lightbox.min.css" rel="stylesheet" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PengenNgoding - Portofolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lightbox2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/lightbox2@2/dist/js/lightbox.min.js"></script>

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

        .prose ol {
            list-style-type: decimal;
            /* angka */
            margin-left: 1.5rem;
            /* jarak biar agak masuk */
            padding-left: 1rem;
        }

        .prose ul {
            list-style-type: disc;
            /* bulatan */
            margin-left: 1.5rem;
            padding-left: 1rem;
        }

        pre {
            background-color: #f8f9fa;
            /* abu muda */
            border: 1px solid #ddd;
            /* garis tipis */
            border-radius: 6px;
            padding: 16px;
            overflow-x: auto;
            margin: 1rem 0;
        }

        pre code {
            font-family: "Fira Code", "Courier New", monospace;
            font-size: 14px;
            color: #212529;
            /* warna teks */
            white-space: pre-wrap;
            /* biar wrap */
            word-break: break-word;
        }

        .attachment__caption {
            display: none;
            /* sembunyikan caption (nama file) */
        }
    </style>
</head>

<body class="bg-white font-sans text-gray-700 leading-relaxed">

    <!-- Header / Navbar -->
    @include('partials.header')

    <!-- Main Article -->
    <main
        class="pt-28 scroll-mt-28 md:pt-32 md:scroll-mt-32 container mx-auto px-4 md:px-8 pb-10 max-w-5xl bg-white shadow-lg rounded-lg relative z-10">
        @auth
            <div class="flex justify-end mb-6">
                <a href="/admin/portofolio/{{ encrypt($portofolio->id ?? '') }}/edit"
                    class="flex items-center space-x-2 bg-black hover:bg-yellow-600 text-white px-4 py-2 rounded-full shadow-md transition duration-200"
                    title="Edit Portofolio">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Edit</span>
                </a>
            </div>
        @endauth

        <!-- ↑ tambahkan `pt-24` untuk memberi jarak dari navbar -->
        <h1 class="text-3xl font-bold mb-3 leading-tight">{{ $portofolio->judul}}</h1>
        <div class="flex items-center mb-6 space-x-3 text-gray-600 text-sm font-medium">
        </div>

        <figure class="mb-6">
            <img src="{{ filter_var($portofolio->gambar, FILTER_VALIDATE_URL) ? $portofolio->gambar : asset('storage/' . $portofolio->gambar) }}"
                class="w-full h-auto rounded-lg shadow-md object-contain" loading="lazy" />
        </figure>


        <!-- Social Share Buttons -->
        <div class="mb-6 flex items-center justify-center space-x-3" aria-label="Bagikan">
            <!-- Facebook -->
            <a href="https://facebook.com/pengenngoding" target="_blank"
                class="bg-[#3b5998] p-2 rounded-full hover:scale-110 transition" aria-label="Facebook">
                <svg class="w-5 h-5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M22 12a10 10 0 10-11.5 9.88v-6.99H8v-2.89h2.5V9.41c0-2.46 1.49-3.82 3.77-3.82 1.09 0 2.23.2 2.23.2v2.45h-1.25c-1.23 0-1.61.77-1.61 1.56v1.88h2.74l-.44 2.89h-2.3v6.99A10 10 0 0022 12z" />
                </svg>
            </a>

            <!-- Twitter -->
            <a href="#" class="bg-[#1da1f2] p-2 rounded-full hover:scale-110 transition" aria-label="Twitter">
                <svg class="w-5 h-5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M22.46 6c-.77.35-1.5.6-2.3.7a4.42 4.42 0 001.95-2.43c-.85.5-1.8.9-2.83 1.1a4.46 4.46 0 00-7.6 4.06A12.7 12.7 0 013 5.18a4.48 4.48 0 001.37 5.94c-.7 0-1.36-.2-1.94-.53v.05a4.46 4.46 0 003.57 4.37c-.3.1-.65.16-1 .16-.25 0-.52-.03-.75-.07a4.46 4.46 0 004.17 3.1A8.95 8.95 0 012 18.58a12.65 12.65 0 006.88 2.01c8.27 0 12.8-6.85 12.8-12.8 0-.2-.01-.42-.02-.63A9.3 9.3 0 0024 6.5a8.8 8.8 0 01-2.54.7z" />
                </svg>
            </a>
            <!-- WhatsApp -->
            <a href="https://wa.me/6282329043833" target="_blank"
                class="bg-green-500 p-2 rounded-full hover:scale-110 transition">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 32 32"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.005 2.4C8.77 2.4 2.805 8.365 2.805 15.6c0 2.735.72 5.285 2.065 7.56L2 30l6.967-2.835a13.145 13.145 0 006.998 1.965c7.236 0 13.2-5.965 13.2-13.2 0-7.235-5.964-13.2-13.2-13.2zm0 23.85c-2.33 0-4.505-.63-6.39-1.755l-.46-.275-4.135 1.68 1.59-4.37-.3-.48A10.96 10.96 0 015.4 15.6c0-5.91 4.69-10.7 10.6-10.7s10.6 4.79 10.6 10.7c0 5.91-4.69 10.65-10.6 10.65zm5.88-8.34c-.32-.16-1.89-.93-2.18-1.035-.29-.11-.5-.16-.71.16-.205.31-.82 1.035-1.005 1.245-.18.205-.37.23-.685.08-.32-.16-1.34-.49-2.55-1.56-.945-.84-1.58-1.875-1.76-2.19-.185-.32-.02-.49.14-.645.145-.145.32-.38.48-.57.16-.195.21-.34.32-.55.11-.205.055-.41-.025-.57-.08-.16-.71-1.705-.97-2.33-.255-.61-.52-.525-.71-.53-.185-.01-.41-.01-.63-.01s-.575.08-.88.41c-.305.33-1.16 1.13-1.16 2.75 0 1.62 1.19 3.185 1.36 3.41.165.215 2.345 3.58 5.69 5.025.795.34 1.415.54 1.9.69.8.255 1.53.22 2.105.135.64-.095 1.89-.77 2.16-1.51.27-.74.27-1.375.19-1.51-.08-.14-.29-.225-.605-.38z" />
                </svg>
            </a>
            <!-- Email -->
            <a href="mailto:admin@codingindo.id"
                class="bg-gray-600 p-2 rounded-full hover:scale-110 transition flex items-center justify-center"
                aria-label="Email">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 4H4c-1.11 0-1.99.89-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.11-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                </svg>
            </a>


        </div>

        <!-- Article Text -->
        <article class="space-y-6 max-w-prose mx-auto text-justify text-gray-700 leading-7">
            <p>{!! $portofolio->deskripsi !!}</p>

            <p>Aplikasi {{$portofolio->judul}} dapat diakses melalui link : <a href="{{$portofolio->link}}"
                    target="_blank" rel="noopener noreferrer"
                    class="text-yellow-700 hover:underline">{{ $portofolio->link }}</a>.</p>

            <p>Jadi, tunggu apalagi? Percayakan kebutuhan aplikasi anda pada kami di Pengenngoding.com!</p>

            <p><strong>tangkapan layar :</strong></p>
        </article>


        <!-- Image Gallery grid -->
        <div
            class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4 pt-6 pb-12 max-w-6xl mx-auto content-center justify-center items-center">
            @foreach ($portofolio->screenshots as $screenshot)
                <a href="{{ filter_var($screenshot->screenshot, FILTER_VALIDATE_URL) ? $screenshot->screenshot : asset('storage/' . $screenshot->screenshot) }}"
                    data-lightbox="gallery" data-title="Screenshot">
                    <img src="{{ filter_var($screenshot->screenshot, FILTER_VALIDATE_URL) ? $screenshot->screenshot : asset('storage/' . $screenshot->screenshot) }}"
                        alt="Screenshot" class="rounded shadow-lg object-cover w-full h-28 hover:opacity-90 transition"
                        loading="lazy" />
                </a>
            @endforeach
        </div>

        <!-- Related Section -->
        <section aria-labelledby="related-title" class="max-w-6xl mx-auto pb-16">
            <h2 id="related-title" class="text-xl font-semibold text-gray-800 mb-4">Related</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @forelse ($related as $item)
                    <a href="{{ route('portofolio.show', encrypt($item->id)) }}"
                        class="block rounded-lg shadow hover:shadow-lg transition bg-white p-4">
                        <img src="{{ Str::startsWith($item->gambar, ['http://', 'https://']) ? $item->gambar : asset('storage/' . $item->gambar) }}"
                            alt="{{ $item->judul }}" class="rounded mb-3 w-full object-cover h-28" loading="lazy" />
                        <h3 class="text-sm font-semibold text-blue-700">{{ $item->judul }}</h3>
                    </a>
                @empty
                    <p class="text-gray-500 text-sm">Tidak ada portofolio terkait.</p>
                @endforelse
            </div>
        </section>
    </main>

    <!-- Footer -->
    @include('partials.footer')

</body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</html>