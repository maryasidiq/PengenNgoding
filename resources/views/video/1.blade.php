<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">
    <title>Pengen Ngoding - Video 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Hapus underline di semua link menu */
        nav a,
        nav ul li a,
        nav .dropdown a {
            text-decoration: none !important;
        }

        nav a:hover,
        nav ul li a:hover,
        nav .dropdown a:hover {
            text-decoration: none !important;
        }

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

        /* Custom scrollbar for Sidebar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #3b82f6;
            border-radius: 4px;
        }

        /* Expand/Collapse arrow icons */
        .accordion-header {
            cursor: pointer;
            user-select: none;
        }

        .accordion-header::before {
            content: "▸";
            display: inline-block;
            margin-right: 0.5rem;
            transition: transform 0.2s ease-in-out;
            color: #2563eb;
        }

        .accordion-header.expanded::before {
            transform: rotate(90deg);
        }

        /* Scrollbar for accordion content if too long */
        .accordion-content {
            animation: fadeIn 0.3s ease-in-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Custom toggle button underline on hover for nav */
        nav a:hover {
            text-decoration: underline;
            text-underline-offset: 4px;
        }

        /* Sidebar link active highlight */
        .sidebar-link.active {
            background-color: #2563eb;
            color: white;
        }
    </style>
</head>

<body class="bg-white text-gray-700 font-sans selection:bg-blue-600 selection:text-white">


    <!-- Header / Navbar -->
    @include('partials.header')

    <!-- Main content container -->
    <main
        class="container mx-auto max-w-7xl min-h-[80vh] pt-20 sm:pt-24 mb-10 px-4 sm:px-6 lg:px-8 flex flex-col-reverse lg:flex-row gap-6">


        <!-- Sidebar left -->
        <aside
            class="w-full lg:w-72 border border-gray-200 rounded shadow-sm p-6 bg-white overflow-y-auto h-auto lg:sticky lg:top-24 lg:h-[calc(100vh-10rem)] flex-shrink-0">

            <div class="mb-8">
                <div class="mb-3 flex items-center space-x-2 font-semibold text-sm">
                    <img src="{{ url('/') }}/images/logo_pengen_ngoding.png" alt="Pengen Ngoding logo blue simple outline style"
                        class="w-6 h-6" />
                    <span>PENGEN NGODING</span>
                </div>
                <h2 class="font-bold text-base leading-tight mb-1">Manajemen Proyek Agile</h2>
                <p class="text-gray-600 text-xs">Pengen Ngoding</p>
            </div>
            <nav class="space-y-3 text-sm text-gray-700">
                <h3 class="uppercase font-semibold mb-2">Kursus Bahan</h3>
                <ul>
                    <li>
                        <a href="#/modul/1"
                            class="no-underline hover:no-underline focus:no-underline active:no-underline visited:no-underline flex items-center space-x-2 hover:bg-blue-50 rounded-md p-1">
                            <span class="inline-block w-4 h-4 shrink-0 rounded-full bg-green-600"></span>
                            <span>Modul 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#/modul/2"
                            class="no-underline hover:no-underline focus:no-underline active:no-underline visited:no-underline flex items-center space-x-2 hover:bg-blue-50 rounded-md p-1">
                            <span class="inline-block w-4 h-4 shrink-0 rounded-full bg-green-600"></span>
                            <span>Modul 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#/modul/3"
                            class="no-underline hover:no-underline focus:no-underline active:no-underline visited:no-underline flex items-center space-x-2 hover:bg-blue-50 rounded-md p-1">
                            <span class="inline-block w-4 h-4 shrink-0 rounded-full bg-green-600"></span>
                            <span>Modul 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="/modul/4"
                            class="no-underline hover:no-underline focus:no-underline active:no-underline visited:no-underline flex items-center space-x-2 cursor-pointer rounded-md bg-blue-50 font-semibold px-2 py-1">
                            <span
                                class="inline-block w-4 h-4 shrink-0 rounded-full bg-blue-600 border-2 border-white"></span>
                            <span>Modul 4</span>
                        </a>
                    </li>
                </ul>
            </nav>


        </aside>

        <!-- Content -->
        <section class="flex-grow bg-white border border-gray-200 rounded shadow-sm p-6 text-sm leading-relaxed">

            <!-- Accordion item -->
            <article class="border-b border-gray-200 pb-4 mb-6">
                <button class="accordion-header w-full text-left font-semibold text-gray-800 mb-3" aria-expanded="true"
                    aria-controls="section1" id="btn-section1">
                    Menerapkan Agile dalam organisasi
                </button>
                <div id="section1" class="accordion-content" aria-labelledby="btn-section1">
                    <p class="mb-3 text-justify">
                        Anda akan belajar menerapkan strategi Agile dalam pengiriman hasil yang digerakkan oleh nilai
                        (value-driven delivery) dan cara menentukan peta jalan nilai (value roadmap). Anda akan
                        mempelajari strategi untuk memperkenalkan pendekatan Agile atau Scrum secara efektif pada
                        organisasi dan membimbing tim Agile. Anda juga akan menyelidiki bagaimana kerangka kerja Agile
                        berevolusi dan bagaimana mendapatkan peluang dalam posisi Agile.
                    </p>
                    <strong class="block mb-2">Tujuan Pembelajaran</strong>
                    <ul class="list-disc ml-6 space-y-1 mb-4">
                        <li>Mencari lowongan kerja untuk posisi Agile dan mempelajari cara agar wawancara Anda berhasil
                        </li>
                        <li>Menjelaskan bagaimana kerangka kerja Agile telah berevolusi dan menjelajahi masa depan
                            Agile.</li>
                        <li>Menjelaskan cara melatih tim Agile dan membantu mereka mengatasi tantangan.</li>
                        <li>Membantu memperkenalkan atau melanjutkan penerapan Agile atau Scrum ke dalam organisasi.
                        </li>
                        <li>Menetapkan peta jalan nilai.</li>
                        <li>Menerapkan strategi Agile dalam pengiriman hasil yang digerakkan oleh nilai untuk mencapai
                            tujuan bisnis.</li>
                    </ul>
                    <button id="toggle1"
                        class="text-blue-600 text-sm font-semibold hover:underline focus:outline-none">Sembunyikan
                        Tujuan Pembelajaran</button>
                </div>
            </article>

            <article class="border-b border-gray-200 py-3 flex items-center justify-between cursor-pointer select-none"
                tabindex="0" aria-expanded="false">
                <span>Memahami pengiriman hasil yang digerakkan oleh nilai</span>
                <span
                    class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs font-semibold select-none">Selesai</span>
            </article>

            <article class="border-b border-gray-200 py-4">
                <button class="accordion-header w-full text-left font-semibold text-gray-800 mb-4" aria-expanded="false"
                    aria-controls="section2" id="btn-section2">
                    Memimpin melalui perubahan dan tantangan
                </button>
                <div id="section2" class="accordion-content hidden" aria-labelledby="btn-section2">
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="{{ route('video/2') }}" class="text-gray-700 hover:underline">
                                Memfasilitasi perubahan organisasi
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video • 5 min</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/4/kerangka-influencer" class="text-gray-700 hover:underline">
                                Kerangka kerja perubahan influencer
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video • 10 min</span>
                        </li>

                        <li class="flex items-center space-x-2 opacity-50">
                            <span
                                class="inline-block text-gray-500 p-1 rounded-full border border-gray-400 bg-gray-100">
                                <svg fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 0 18 14.158V11a6 6 0 0 0-9-5" />
                                </svg>
                            </span>
                            <a href="#/modul/4/sumber-pengaruh" class="text-gray-500 hover:underline">
                                Sumber pengaruh
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video • 10 min</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/4/membimbing-tim" class="text-gray-700 hover:underline">
                                Membimbing tim Agile
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video • 3 min</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/4/coaching-vs-managing" class="text-gray-700 hover:underline">
                                Membimbing (coaching) versus mengelola (managing) di Agile
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video • 10 min</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/4/quiz-agile-coaching" class="text-gray-700 hover:underline">
                                Uji pengetahuan Anda: Membimbing secara Agile
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video Latihan</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/4/tantangan-agile" class="text-gray-700 hover:underline">
                                Tantangan tim Agile
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video • 7 min</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/4/refleksi-coaching" class="text-gray-700 hover:underline">
                                Refleksi: Membimbing versus mengelola
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video Latihan • Dikirim</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/4/tantangan-umum-coaching" class="text-gray-700 hover:underline">
                                Tantangan umum membimbing dalam Agile
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video • 7 min</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/4/quiz-tantangan-agile" class="text-gray-700 hover:underline">
                                Uji pengetahuan Anda: Tantangan-tantangan Agile
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video Latihan</span>
                        </li>
                    </ul>
                </div>
            </article>

            <article class="border-b border-gray-200 flex items-center justify-between py-3 cursor-pointer select-none"
                tabindex="0" aria-expanded="false">
                <span>Peluang-peluang Agile</span>
                <span
                    class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs font-semibold select-none">Selesai</span>
            </article>

            <article class="border-b border-gray-200 py-4">
                <button class="accordion-header w-full text-left font-semibold text-gray-800 mb-4" aria-expanded="false"
                    aria-controls="section3" id="btn-section3">
                    Ulasan materi: Agile dalam praktik
                </button>
                <div id="section3" class="accordion-content hidden" aria-labelledby="btn-section3">
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/5/tantangan-mingguan" class="text-gray-700 hover:underline">
                                Tantangan Mingguan 4
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video Tugas</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/5/penutup-materi" class="text-gray-700 hover:underline">
                                Penutup materi
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Video • 48 sec</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/5/daftar-istilah" class="text-gray-700 hover:underline">
                                Daftar Istilah Materi 5
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Bacaan • 10 min</span>
                        </li>

                        <li class="flex items-center space-x-2 opacity-50">
                            <span
                                class="inline-block text-gray-500 p-1 rounded-full border border-gray-400 bg-gray-100">
                                <svg fill="none" stroke="currentColor" stroke-width="2" class="w-4 h-4"
                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 0 18 14.158V11a6 6 0 0 0-9-5" />
                                </svg>
                            </span>
                            <a href="#/modul/5/perjalanan-pembelajaran" class="text-gray-500 hover:underline">
                                Perjalanan pembelajaran Anda
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Perintah Diskusi • 10 min</span>
                        </li>

                        <li class="flex items-center space-x-2">
                            <span class="inline-block text-white bg-green-600 p-1 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                                    stroke-width="3" viewBox="0 0 24 24" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <a href="#/modul/6/memulai-materi" class="text-gray-700 hover:underline">
                                Memulai Materi 6
                            </a>
                            <span class="text-gray-500 text-xs ml-auto text-right">Bacaan • 10 min</span>
                        </li>
                    </ul>

                </div>
            </article>

            <article class="py-3 flex items-center justify-between cursor-pointer select-none" tabindex="0"
                aria-expanded="false">
                <span>Opsional: Menemukan peluang kerja</span>
                <span
                    class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs font-semibold select-none">Selesai</span>
            </article>

        </section>
    </main>


    <!-- Footer -->
    @include('partials.footer')

</body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">

</script>
<script>
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', () => {
            const expanded = header.classList.contains('expanded');
            // Close all except this
            document.querySelectorAll('.accordion-header').forEach(h => {
                h.classList.remove('expanded');
                if (h.nextElementSibling) h.nextElementSibling.classList.add('hidden');
            });
            if (!expanded) {
                header.classList.add('expanded');
                if (header.nextElementSibling) header.nextElementSibling.classList.remove('hidden');
            }
        });
    });

    // Toggle "Sembunyikan Tujuan Pembelajaran" button text changes and content show/hide
    const toggle1Btn = document.getElementById('toggle1');
    const section1 = document.getElementById('section1');
    toggle1Btn.addEventListener('click', () => {
        if (section1.style.display === 'none' || section1.classList.contains('hidden')) {
            section1.classList.remove('hidden');
            toggle1Btn.textContent = 'Sembunyikan Tujuan Pembelajaran';
        } else {
            section1.classList.add('hidden');
            toggle1Btn.textContent = 'Tampilkan Tujuan Pembelajaran';
        }
    });


</script>

</html>