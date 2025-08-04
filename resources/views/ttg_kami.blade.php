<!DOCTYPE html>
<html lang="id">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">
    <title>PengenNgoding - Tentang Kami</title>
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
    </style>
</head>

<body class="bg-white font-sans text-gray-700 leading-relaxed">

    @include('partials.header')

        <!-- Mobile Menu -->
        <div x-show="mobileOpen" x-transition
            class="md:hidden px-5 pt-4 pb-6 space-y-3 bg-white text-sm font-semibold text-gray-700">
            <a href="{{ route('beranda') }}" class="block hover:text-indigo-600">BERANDA</a>
            <div x-data="{ open: false }">
                <button @click="open = !open"
                    class="w-full text-left flex items-center justify-between hover:text-indigo-600">
                    BLOG
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
                <div x-show="open" x-transition class="mt-2 pl-3 space-y-2">
                    <a href="{{ route('artikel') }}" class="block hover:text-indigo-600">Artikel</a>
                    <a href="{{ route('tips') }}" class="block hover:text-indigo-600">Tips</a>
                    <a href="{{ route('video') }}" class="block hover:text-indigo-600">Video</a>
                </div>
            </div>
            <a href="#kerjasama" class="block hover:text-indigo-600">KERJASAMA</a>
            <a href="#portfolio" class="block hover:text-indigo-600">PORTFOLIO</a>
            <a href="{{ route('ttg_kami') }}" class="block hover:text-indigo-600">TENTANG KAMI</a>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="pt-32 max-w-7xl mx-auto px-4 py-8">
        <!-- Gambar Hero -->
        <div class="overflow-hidden rounded-2xl shadow-md">
            <img src="{{ asset('images//work_space.jpg') }}" alt="Minimalist workspace"
                class="w-full h-[360px] object-cover" loading="lazy" />
        </div>

        <!-- Icon Sosial -->
        <div class="flex flex-wrap justify-center items-center gap-4 mt-6">
            <!-- Facebook -->
            <a href="#" class="bg-[#3b5998] p-2 rounded-full hover:scale-110 transition" aria-label="Facebook">
                <svg class="w-5 h-5 md:w-6 md:h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M22 12a10 10 0 10-11.5 9.88v-6.99H8v-2.89h2.5V9.41c0-2.46 1.49-3.82 3.77-3.82 1.09 0 2.23.2 2.23.2v2.45h-1.25c-1.23 0-1.61.77-1.61 1.56v1.88h2.74l-.44 2.89h-2.3v6.99A10 10 0 0022 12z" />
                </svg>
            </a>

            <!-- Twitter -->
            <a href="#" class="bg-[#1da1f2] p-2 rounded-full hover:scale-110 transition" aria-label="Twitter">
                <svg class="w-5 h-5 md:w-6 md:h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M22.46 6c-.77.35-1.5.6-2.3.7a4.42 4.42 0 001.95-2.43c-.85.5-1.8.9-2.83 1.1a4.46 4.46 0 00-7.6 4.06A12.7 12.7 0 013 5.18a4.48 4.48 0 001.37 5.94c-.7 0-1.36-.2-1.94-.53v.05a4.46 4.46 0 003.57 4.37c-.3.1-.65.16-1 .16-.25 0-.52-.03-.75-.07a4.46 4.46 0 004.17 3.1A8.95 8.95 0 012 18.58a12.65 12.65 0 006.88 2.01c8.27 0 12.8-6.85 12.8-12.8 0-.2-.01-.42-.02-.63A9.3 9.3 0 0024 6.5a8.8 8.8 0 01-2.54.7z" />
                </svg>
            </a>

            <!-- LinkedIn -->
            <a href="#" class="bg-[#0077b5] p-2 rounded-full hover:scale-110 transition" aria-label="LinkedIn">
                <svg class="w-5 h-5 md:w-6 md:h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M20 0H4a4 4 0 00-4 4v16a4 4 0 004 4h16a4 4 0 004-4V4a4 4 0 00-4-4zM7.2 19H4.5V9.3H7.2V19zm-1.35-11.7a1.63 1.63 0 110-3.26 1.63 1.63 0 010 3.26zM20 19h-2.7v-4c0-1-1-1.3-1.1-1.3-.6 0-1 0-1 .9V19H11V9.3h2.6v1.3s.5-.9 1.5-1 1.9.3 1.9 2.3V19z" />
                </svg>
            </a>

            <!-- Telegram -->
            <a href="#" class="bg-[#0088cc] p-2 rounded-full hover:scale-110 transition" aria-label="Telegram">
                <svg class="w-5 h-5 md:w-6 md:h-6 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M9.999 17.9l-.635-4.48 9.237-6.48-11.422 5.6-4.52-1.4c-.965-.3-.94-1.6.04-1.9l19.225-6.2c.88-.3 1.7.6 1.4 1.5l-3.2 13.2c-.2.9-1.2 1.2-1.9.7l-5.1-3.9-2.1 2z" />
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
        </div>
    </section>


    <main
        class="pt-0 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-6 mt-12 mb-16 scroll-mt-32">

        <!-- Right Column - Gambar Logo -->
        <aside class="order-1 md:order-2 flex justify-center items-start md:items-center">
            <div class="text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo PengenNgoding" class="w-70 h-auto mx-auto" />
            </div>
        </aside>

        <!-- Left Column -->
        <section class="order-2 md:order-1 space-y-12 text-slate-700">
            <!-- Tentang PengenNgoding -->
            <article class="flex items-start space-x-4">
                <!-- Icon: Academic Cap -->
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-8 h-8 mt-1 text-[#0863A9]"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 14.25c2.623 0 4.75-2.127 4.75-4.75S14.623 4.75 12 4.75 7.25 6.877 7.25 9.5s2.127 4.75 4.75 4.75Zm7.5 2.5c0-2.15-3.584-3.25-7.5-3.25S4.5 14.6 4.5 16.75v1a.75.75 0 0 0 .75.75h13.5a.75.75 0 0 0 .75-.75v-1Z" />
                </svg>
                <div>
                    <h3 class="font-semibold text-[#0863A9] text-xl">Tentang PengenNgoding</h3>
                    <p class="mt-2 text-base leading-relaxed">
                        <strong class="text-slate-900">PengenNgoding</strong> adalah sebuah bentuk kepedulian kami
                        terhadap perkembangan teknologi dan informasi di era perkembangan teknologi yang sangat pesat.
                        PengenNgoding merupakan sebuah wadah belajar bersama untuk saling bertukar informasi demi
                        kebaikan bersama.
                    </p>
                </div>
            </article>

            <!-- Komunitas Belajar -->
            <article class="flex items-start space-x-4">
                <!-- Icon: Users -->
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-8 h-8 mt-1 text-[#0863A9]"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M15.75 6a3.75 3.75 0 1 0-7.5 0 3.75 3.75 0 0 0 7.5 0ZM4.5 18.75v-1.5A3.75 3.75 0 0 1 8.25 13.5h7.5a3.75 3.75 0 0 1 3.75 3.75v1.5a.75.75 0 0 1-.75.75H5.25a.75.75 0 0 1-.75-.75Z" />
                </svg>
                <div>
                    <h3 class="font-semibold text-[#0863A9] text-xl">Komunitas Belajar</h3>
                    <p class="mt-2 text-base leading-relaxed">
                        Kami yakin dengan komunitas yang kuat daerah menjadi hebat. Kami tidak menggurui tapi ingin
                        berbagi informasi. Mari sebarkan kebaikan dengan ilmu yang bermanfaat. Silakan bergabung
                        bersama kami dan bagikan apa yang kalian punya demi kemajuan Indonesia.
                    </p>
                </div>
            </article>
        </section>
    </main>

    <!-- Commercial Needs Section with Separator -->
    <div class="relative text-center my-8">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
        </div>
        <div class="relative inline-block bg-white px-4 text-sm text-gray-600 uppercase tracking-wider">
            kebutuhan komersil
        </div>
    </div>

    <section
        class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 px-4 sm:px-6 lg:px-8 mb-20 text-sm text-slate-600">

        <!-- Kiri: Logo dan Social Media -->
        <div class="flex flex-col items-center space-y-5">
            <img src="{{ asset('images/logo pt.png') }}" alt="Logo PT Codingindo Multisolution Digital"
                class="w-24 h-24 sm:w-32 sm:h-32 lg:w-40 lg:h-40 object-contain" loading="lazy"
                onerror="this.onerror=null;this.src='https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/35e3e0e6-216f-45bb-9766-a6b91d3f61ce.png';" />

            <p class="font-semibold text-center text-indigo-900">PT. CODINGINDO MULTISOLUTION DIGITAL</p>
            <div class="flex space-x-4">
                <a href="#" class="bg-[#3b5998] p-2 rounded-full hover:scale-110 transition" aria-label="Facebook">
                    <svg class="w-5 h-5 md:w-6 md:h-6 fill-white" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M22 12a10 10 0 10-11.5 9.88v-6.99H8v-2.89h2.5V9.41c0-2.46 1.49-3.82 3.77-3.82 1.09 0 2.23.2 2.23.2v2.45h-1.25c-1.23 0-1.61.77-1.61 1.56v1.88h2.74l-.44 2.89h-2.3v6.99A10 10 0 0022 12z" />
                    </svg>
                </a>
                <a href="#" class="bg-[#1da1f2] p-2 rounded-full hover:scale-110 transition" aria-label="Twitter">
                    <svg class="w-5 h-5 md:w-6 md:h-6 fill-white" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path
                            d="M22.46 6c-.77.35-1.5.6-2.3.7a4.42 4.42 0 001.95-2.43c-.85.5-1.8.9-2.83 1.1a4.46 4.46 0 00-7.6 4.06A12.7 12.7 0 013 5.18a4.48 4.48 0 001.37 5.94c-.7 0-1.36-.2-1.94-.53v.05a4.46 4.46 0 003.57 4.37c-.3.1-.65.16-1 .16-.25 0-.52-.03-.75-.07a4.46 4.46 0 004.17 3.1A8.95 8.95 0 012 18.58a12.65 12.65 0 006.88 2.01c8.27 0 12.8-6.85 12.8-12.8 0-.2-.01-.42-.02-.63A9.3 9.3 0 0024 6.5a8.8 8.8 0 01-2.54.7z" />
                    </svg>
                </a>
                <a href="https://youtube.com/@pengenngoding" aria-label="YouTube PengenNgoding"
                    class="bg-[#FF0000] p-2 rounded-full hover:scale-110 transition">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white fill-current" role="img" viewBox="0 0 24 24">
                        <title>YouTube</title>
                        <path
                            d="M23.498 6.186a2.979 2.979 0 0 0-2.096-2.103C19.76 3.625 12 3.625 12 3.625s-7.76 0-9.402.458A2.979 2.979 0 0 0 .5 6.186 31.36 31.36 0 0 0 0 12a31.36 31.36 0 0 0 .5 5.814 2.979 2.979 0 0 0 2.096 2.103c1.642.458 9.402.458 9.402.458s7.76 0 9.402-.458a2.979 2.979 0 0 0 2.096-2.103A31.36 31.36 0 0 0 24 12a31.36 31.36 0 0 0-.502-5.814zM9.75 15.545V8.455L15.545 12l-5.795 3.545z" />
                    </svg>
                </a>
            </div>
            <a href="#"
                class="mt-3 inline-block rounded-full bg-green-600 hover:bg-green-700 text-white px-5 py-2 text-sm font-semibold focus:outline-none focus:ring-2 focus:ring-green-400"
                aria-label="Hubungi Kami via WhatsApp">
                Hubungi Kami
            </a>
        </div>

        <!-- Kanan: Artikel -->
        <div class="space-y-6 text-sm text-slate-700">
            <!-- Tentang CMD -->
            <article class="flex items-start space-x-4">
                <!-- Icon: Office Building (Profesional) -->
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-8 h-8 mt-1 text-[#0863A9]"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M3.75 2A1.75 1.75 0 0 0 2 3.75v16.5c0 .966.784 1.75 1.75 1.75h16.5A1.75 1.75 0 0 0 22 20.25V3.75A1.75 1.75 0 0 0 20.25 2H3.75Zm0 1.5h16.5c.138 0 .25.112.25.25v6.25H3.5V3.75c0-.138.112-.25.25-.25ZM3.5 11h17v9.25a.25.25 0 0 1-.25.25H3.75a.25.25 0 0 1-.25-.25V11ZM7 13.25a.75.75 0 0 1 1.5 0v4.5a.75.75 0 0 1-1.5 0v-4.5Zm4.25 0a.75.75 0 0 1 1.5 0v4.5a.75.75 0 0 1-1.5 0v-4.5Zm4.25 0a.75.75 0 0 1 1.5 0v4.5a.75.75 0 0 1-1.5 0v-4.5Z" />
                </svg>

                <div class="flex-1">
                    <h3 class="font-semibold text-[#0863A9] text-xl">CMD ( CODINGINDO MULTISOLUTION DIGITAL )</h3>
                    <p class="mt-2 text-base leading-relaxed">
                        <strong class="text-slate-900">Codingindo Multisolution Digital</strong> adalah layanan
                        profesional kami dalam pengembangan perangkat lunak yang berdiri sejak tahun 2021.
                        Berfokus pada <strong>teknologi informasi dan edukasi</strong>, kami telah mengerjakan berbagai
                        proyek baik di sektor swasta maupun pemerintahan.
                        Dengan tim yang berpengalaman dan adaptif terhadap perkembangan teknologi, CMD hadir sebagai
                        solusi tepat untuk memenuhi kebutuhan digital anda.
                    </p>
                </div>
            </article>


            <!-- Portfolio -->
            <article class="flex items-start space-x-4">
                <!-- Icon: Folder -->
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-8 h-8 mt-1 text-[#0863A9]"
                    fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M10 2a2 2 0 0 0-2 2v2H6.75A2.75 2.75 0 0 0 4 8.75v10.5A2.75 2.75 0 0 0 6.75 22h10.5A2.75 2.75 0 0 0 20 19.25V8.75A2.75 2.75 0 0 0 17.25 6H16V4a2 2 0 0 0-2-2h-4ZM14 6h-4V4h4v2Zm-2 7.25a.75.75 0 0 1 .75.75v.25h2.5a.75.75 0 0 1 0 1.5h-2.5v.25a.75.75 0 0 1-1.5 0v-.25h-2.5a.75.75 0 0 1 0-1.5h2.5v-.25a.75.75 0 0 1 .75-.75Z" />
                </svg>

                <!-- Text & Gallery -->
                <div class="flex-1">
                    <!-- Title & Description -->
                    <h3 class="font-semibold text-[#0863A9] text-xl">Portfolio</h3>
                    <p class="mt-2 text-base leading-relaxed mb-4">
                        Berikut adalah beberapa proyek yang telah kami selesaikan di berbagai sektor industri, termasuk
                        aplikasi edukasi, sistem informasi, serta solusi digital lainnya.
                    </p>

                    <!-- Gallery Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                        <!-- Card 1 -->
                        <a href="#"
                            class="relative group rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
                            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/bea9833b-944a-4579-a747-02189f8ef259.png"
                                alt="Landing page Jepara International Furniture" class="w-full h-48 object-cover"
                                loading="lazy"
                                onerror="this.onerror=null;this.src='https://placehold.co/300x120?text=Image+Not+Loaded';" />
                            <div
                                class="absolute inset-0 bg-[#07345B]/90 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <p class="text-sm font-bold text-center px-2">Landing Page<br>Jepara Furniture</p>
                            </div>
                        </a>

                        <!-- Card 2 -->
                        <a href="#"
                            class="relative group rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
                            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/8a8ffb1b-04f0-4d2d-acef-f514ce940d99.png"
                                alt="Dashboard user interface" class="w-full h-48 object-cover" loading="lazy"
                                onerror="this.onerror=null;this.src='https://placehold.co/300x120?text=Image+Not+Loaded';" />
                            <div
                                class="absolute inset-0 bg-[#07345B]/90 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <p class="text-sm font-bold text-center px-2">Dashboard<br>User Interface</p>
                            </div>
                        </a>

                        <!-- Card 3 -->
                        <a href="#"
                            class="relative group rounded-lg overflow-hidden shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
                            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/515214e4-bccb-47e6-a807-bb404a7591f6.png"
                                alt="Web app screenshots" class="w-full h-48 object-cover" loading="lazy"
                                onerror="this.onerror=null;this.src='https://placehold.co/300x120?text=Image+Not+Loaded';" />
                            <div
                                class="absolute inset-0 bg-[#07345B]/90 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <p class="text-sm font-bold text-center px-2">Web App<br>Screenshots</p>
                            </div>
                        </a>
                    </div>
                </div>
            </article>


        </div>
    </section>



    <!-- Footer -->
        @include('partials.footer')
</body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</html>