<!DOCTYPE html>
<html lang="id">
<link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PengenNgoding - {{ $title }}</title>
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

    @include('partials.header')

    <!-- Hero Section -->
    <section id="beranda" class="relative bg-cover bg-center bg-no-repeat pt-24 pb-16 scroll-mt-24"
        style="background-image: url('{{ asset('images/work_space.jpg') }}');">

        <!-- Overlay Kebiruan -->
        <div class="absolute inset-0 bg-blue-900 opacity-50 mix-blend-multiply"></div>

        <!-- Konten -->
        <div
            class="relative z-10 max-w-7xl mx-auto px-5 md:px-10 min-h-[500px] flex flex-col md:flex-row items-center md:items-stretch">

            <!-- Spacer kiri (desktop only) -->
            <div class="hidden md:block md:w-1/2"></div>

            <!-- Konten kanan -->
            <div class="w-full md:w-1/2 flex flex-col items-center md:items-start justify-center text-white text-center md:text-left space-y-5
             min-h-[400px] md:min-h-0">

                <h1 class="text-2xl sm:text-3xl md:text-5xl font-extrabold leading-tight drop-shadow-xl">
                    PENGEMBANG APLIKASI <br />
                    <span class="text-indigo-300">DAN EDUKASI</span>
                </h1>

                <p class="text-sm sm:text-base md:text-lg font-light drop-shadow">
                    Mari Belajar bersama kami dan Wujudkan kebutuhan aplikasi anda
                </p>

                <!-- Tombol -->
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 w-full sm:w-auto justify-center md:justify-start">
                    <a href="#tentang-kami"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold rounded-lg transition text-center w-full sm:w-auto">
                        Mulai
                    </a>
                    <a href="#kontak"
                        class="px-6 py-3 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold rounded-lg transition text-center w-full sm:w-auto">
                        Hubungi Kami
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Tentang Pengenncoding Section -->
    <section id="tentang-kami" class="relative bg-white py-16 px-5 md:px-10">
        <div class="max-w-6xl mx-auto bg-[url('https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/356373e8-9d9f-4ad1-ae15-461ded9cd2dd.png')] bg-no-repeat bg-center bg-cover rounded-lg p-6 sm:p-10 shadow-lg overflow-hidden"
            style="background-blend-mode: lighten;">

            <!-- Heading -->
            <div class="text-center mb-12 text-white space-y-4">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 sm:w-12 sm:h-12 text-indigo-300"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                    </svg>
                </div>
                <h2 class="font-bold text-base sm:text-lg md:text-2xl uppercase tracking-wide">
                    TENTANG PENGEN NGODING
                </h2>
                <p class="max-w-4xl mx-auto text-xs sm:text-sm md:text-base">
                    Kami menyediakan solusi integrasi dan layanan pengembangan aplikasi dan edukasi berbasis teknologi
                    yang membantu kebutuhan anda untuk lebih mudah berkembang dan sukses.
                </p>
            </div>

            <!-- Grid Cards -->
            <div class="grid sm:grid-cols-2 gap-6 sm:gap-8 max-w-5xl mx-auto">

                <!-- CARD 1 -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/6f35d8ff-fb88-42b8-8031-410796d69319.png"
                        alt="Gambar 1" loading="lazy" class="w-full object-cover h-52 sm:h-56 md:h-64">
                    <div class="p-6 flex flex-col justify-center h-full">
                        <div class="flex items-center space-x-3 mb-3 text-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 9h6v6H9V9zM3 10h2v4H3v-4zm16 0h2v4h-2v-4zm-8 11v-2m0-16v2m-7 7h2m12 0h2M4 4l2 2m12-2l2 2m-2 14l2-2m-14 2l2-2" />
                            </svg>
                            <h3 class="text-base sm:text-lg font-semibold">System Informasi</h3>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed">
                            <strong>System Informasi (SI)</strong> adalah kombinasi dari teknologi informasi dan
                            aktivitas orang yang
                            menggunakan teknologi untuk mengolah dan menyalurkan informasi. Kami berkomitmen menyediakan
                            sistem yang disesuaikan
                            dengan kebutuhan dan hasil analisis lapangan.
                        </p>
                    </div>
                </article>

                <!-- CARD 2 -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e5eeab85-86be-4551-ab7c-422944159dc1.png"
                        alt="Gambar 2" loading="lazy" class="w-full object-cover h-52 sm:h-56 md:h-64">
                    <div class="p-6 flex flex-col justify-center h-full">
                        <div class="flex items-center space-x-3 mb-3 text-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 12v2m0-10V4a2 2 0 012-2h4a2 2 0 012 2v2M6 6h12M6 10v8a2 2 0 002 2h8a2 2 0 002-2v-8H6z" />
                            </svg>
                            <h3 class="text-base sm:text-lg font-semibold">Jasa Konsultasi</h3>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed mb-2">
                            Industri 4.0 dan digitalisasi menuntut kita untuk terus adaptif.
                        </p>
                        <p class="text-sm text-gray-700 leading-relaxed font-semibold">
                            <span class="italic">PengenNgoding</span> adalah anak perusahaan dari <a href="#"
                                class="text-indigo-600 underline">Codingindo Multisolutions Digital</a>, bergerak di
                            bidang konsultasi,
                            IT, performa, dan solusi digital lainnya.
                        </p>
                    </div>
                </article>

                <!-- CARD 3 -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/9750d138-92d3-453c-aa3f-6c70213b29d6.png"
                        alt="Gambar 3" loading="lazy" class="w-full object-cover h-52 sm:h-56 md:h-64">
                    <div class="p-6 flex flex-col justify-center h-full">
                        <div class="flex items-center space-x-3 mb-3 text-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m13-3.13a4 4 0 10-8 0 4 4 0 008 0zm-10 0a4 4 0 10-8 0 4 4 0 008 0z" />
                            </svg>
                            <h3 class="text-base sm:text-lg font-semibold">Komunitas</h3>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed">
                            Kami membangun komunitas sebagai wadah belajar dan dukungan bersama untuk perkembangan
                            individu dan tim.
                        </p>
                    </div>
                </article>

                <!-- CARD 4 -->
                <article class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/0dd85b1f-1fcc-4a04-968b-3d134b3b0441.png"
                        alt="Gambar 4" loading="lazy" class="w-full object-cover h-52 sm:h-56 md:h-64">
                    <div class="p-6 flex flex-col justify-center h-full">
                        <div class="flex items-center space-x-3 mb-3 text-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l9-5-9-5-9 5 9 5z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.84 4.79v.382a1.5 1.5 0 01-1.5 1.5H6.5a1.5 1.5 0 01-1.5-1.5v-.382a12.083 12.083 0 01.84-4.79L12 14z" />
                            </svg>
                            <h3 class="text-base sm:text-lg font-semibold">Edukasi dan Pembelajaran</h3>
                        </div>
                        <p class="text-sm text-gray-700 leading-relaxed">
                            Kami menyediakan kelas, kursus, dan workshop untuk meningkatkan keterampilan digital dan
                            teknologi Anda.
                        </p>
                        <p class="text-sm text-gray-700 leading-relaxed mt-2">
                            Edukasi adalah kunci menuju kesuksesan masa depan di era digital.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>
    </div>
    </section>

    <!-- Pelanggan Section -->
    <section id="kerjasama" class="scroll-mt-20 bg-white py-16 px-5 md:px-10">
        <div class="max-w-5xl mx-auto text-center text-black">
            <!-- Ikon -->
            <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM4 19v-1a4 4 0 014-4h8a4 4 0 014 4v1M16 11l2 2 4-4" />
                </svg>
            </div>

            <!-- Judul -->
            <h2 class="font-bold text-base sm:text-lg md:text-2xl uppercase tracking-wide text-indigo-700 mb-4">
                PELANGGAN KAMI
            </h2>

            <p class="text-sm md:text-base max-w-2xl mx-auto mb-6">
                Kami bekerja sama dengan beberapa instansi baik lingkup pemerintahan maupun swasta. Kami menyediakan
                kebutuhan sistem informasi yang disesuaikan dengan kondisi di lapangan, sehingga aplikasi yang
                dikerjakan dapat digunakan dan diimplementasikan dengan baik.
            </p>

            <!-- Bagian Pelanggan -->
            <div class="swiper mySwiper mt-10 bg-transparent px-4">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->

                    @foreach ($clients as $client)
                        <div class="swiper-slide text-center relative">
                            <div
                                class="bg-white rounded-2xl p-4 shadow-md w-36 h-36 mx-auto flex items-center justify-center relative">
                                <img src="{{ asset('storage/' . $client->gambar) }}" alt="{{ $client->nama }}"
                                    class="h-20 object-contain" />

                                {{-- Tombol Edit untuk Admin --}}
                                @auth
                                    <div class="absolute bottom-1 right-1 z-10">
                                        <a href="/admin/client/{{ $client->id ?? '' }}/edit"
                                            class="bg-black hover:bg-yellow-600 text-white p-1.5 rounded-full shadow-md flex items-center justify-center transition duration-200"
                                            title="Edit Client">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                    </div>
                                @endauth
                            </div>
                            <p class="mt-2 text-xs font-semibold text-sky-600 uppercase tracking-wide">{{ $client->nama }}
                            </p>
                        </div>
                    @endforeach

                </div>
                <!-- Navigation -->
                <!-- <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> -->
                <div class="swiper-pagination !relative z-10 mt-6"></div>
            </div>
        </div>
    </section>

    <!-- Project Section -->
    <section id="portfolio" class="scroll-mt-20 bg-indigo-50 py-16 px-5 md:px-10">

        <div class="max-w-5xl mx-auto text-center text-black">
            <!-- Ikon -->
            <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-indigo-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                </svg>
            </div>

            <!-- Judul -->
            <h2 class="font-bold text-base sm:text-lg md:text-2xl uppercase tracking-wide text-indigo-700 mb-4">
                PROJECT KAMI
            </h2>

            <!-- Deskripsi -->
            <p class="text-sm md:text-base max-w-2xl mx-auto mb-6">
                Kami sudah berhasil mengerjakan project sesuai kebutuhan seperti aplikasi dan sistem yang berkualitas
                modern dan profesional, disesuaikan dengan kebutuhan klien dari berbagai sektor.
            </p>

            <!-- Tombol -->
            <a href="{{ route('portofolio.index') }}"
                class="inline-flex items-center space-x-2 px-5 py-2 rounded-full mb-10 font-semibold text-sm transition"
                style="background-color: #07345B; color: white;">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11 5a7 7 0 017 7c0 1.393-.42 2.683-1.137 3.75l4.387 4.387a1 1 0 01-1.414 1.414l-4.387-4.387A7 7 0 1111 5z" />
                </svg>
                <span>Lebih Banyak</span>
            </a>

            <!-- Grid Project dengan Animasi Hover -->


            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5 mt-10">
                @foreach ($portofolios as $portofolio)
                    <div class="relative group rounded-lg overflow-hidden shadow-lg">
                        <a href="{{ route('portofolio.show', $portofolio->id) }}">
                            <img src="{{ filter_var($portofolio->gambar, FILTER_VALIDATE_URL) ? $portofolio->gambar : asset('storage/' . $portofolio->gambar) }}"
                                alt="{{ $portofolio->judul }}" class="w-full h-48 object-cover">

                            {{-- Overlay Judul --}}
                            <div
                                class="absolute inset-0 bg-[#07345B]/90 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                                <p class="text-center text-sm font-bold px-2">{{ $portofolio->judul }}</p>
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
            </div>
        </div>
    </section>


    <!-- Testimoni Section -->
    <section id="testimoni" class="bg-white py-16 px-5 md:px-10">
        <div class="max-w-5xl mx-auto text-center text-black">

            <!-- Ikon -->
            <div class="flex justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-yellow-500" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                </svg>
            </div>

            <!-- Judul -->
            <h2 class="font-bold text-base sm:text-lg md:text-2xl uppercase tracking-wide text-yellow-500 mb-4">
                TESTIMONI PELANGGAN
            </h2>

            <!-- Deskripsi -->
            <p class="text-sm md:text-base max-w-2xl mx-auto mb-6 text-gray-700">
                Beberapa testimoni dari pelanggan yang telah menggunakan jasa kami. Testimoni adalah bentuk kepercayaan,
                serta semangat pengembangan kita tetap berkualitas dengan lebih fokus kepada Anda.
            </p>

            <!-- Swiper -->
            <div class="swiper testiSwiper bg-transparent px-4 mt-10">
                <div class="swiper-wrapper">

                    @foreach ($testimonis as $testimoni)
                        <!-- Testimoni 1 -->
                        <div class="swiper-slide text-center relative">
                            <div class="bg-gray-50 rounded-lg shadow-md p-6 mx-auto max-w-md">
                                <p class="italic text-sm leading-relaxed mb-4">
                                    {{ $testimoni->pesan }}
                                </p>
                                <div class="text-xs text-indigo-700 font-semibold mb-1">{{ $testimoni->nama }}</div>
                                <div class="text-xs text-indigo-400">{{ $testimoni->jabatan }}</div>
                            </div>

                            {{-- Tombol Edit untuk Admin --}}
                            @auth
                                <div class="absolute top-1 right-1 z-10">
                                    <a href="/admin/testimoni/{{ $testimoni->id ?? '' }}/edit"
                                        class="bg-black hover:bg-yellow-600 text-white p-1.5 rounded-full shadow-md flex items-center justify-center transition duration-200"
                                        title="Edit Testimoni">
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


                </div>

                <!-- Pagination -->
                <div class="swiper-pagination !relative z-10 mt-6"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')


</body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            },
        },
    });
    const testiSwiper = new Swiper(".testiSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
    });
</script>

</html>