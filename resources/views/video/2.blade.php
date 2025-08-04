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
                    <img src="/images/logo_pengen_ngoding.png" alt="Pengen Ngoding logo blue simple outline style"
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
                            <span>Modul 3</span>
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
                    <li>
                        <a href="#/modul/5"
                            class="no-underline hover:no-underline focus:no-underline active:no-underline visited:no-underline flex items-center space-x-2 hover:bg-blue-50 rounded-md p-1">
                            <span class="inline-block w-4 h-4 shrink-0 rounded-full bg-gray-300"></span>
                            <span>Modul 5</span>
                        </a>
                    </li>
                    <li>
                        <a href="#/modul/6"
                            class="no-underline hover:no-underline focus:no-underline active:no-underline visited:no-underline flex items-center space-x-2 hover:bg-blue-50 rounded-md p-1">
                            <span class="inline-block w-4 h-4 shrink-0 rounded-full bg-gray-300"></span>
                            <span>Modul 6</span>
                        </a>
                    </li>
                    <li>
                        <a href="#/modul/7"
                            class="no-underline hover:no-underline focus:no-underline active:no-underline visited:no-underline flex items-center space-x-2 hover:bg-blue-50 rounded-md p-1">
                            <span class="inline-block w-4 h-4 shrink-0 rounded-full bg-gray-300"></span>
                            <span>Modul 7</span>
                        </a>
                    </li>
                    <li>
                        <a href="#/modul/8"
                            class="no-underline hover:no-underline focus:no-underline active:no-underline visited:no-underline flex items-center space-x-2 hover:bg-blue-50 rounded-md p-1">
                            <span class="inline-block w-4 h-4 shrink-0 rounded-full bg-gray-300"></span>
                            <span>Modul 8</span>
                        </a>
                    </li>
                    <li>
                        <a href="#/modul/9"
                            class="no-underline hover:no-underline focus:no-underline active:no-underline visited:no-underline flex items-center space-x-2 hover:bg-blue-50 rounded-md p-1">
                            <span class="inline-block w-4 h-4 shrink-0 rounded-full bg-gray-300"></span>
                            <span>Modul 9</span>
                        </a>
                    </li>
                    <li>
                        <a href="#/modul/10"
                            class="no-underline hover:no-underline focus:no-underline active:no-underline visited:no-underline flex items-center space-x-2 hover:bg-blue-50 rounded-md p-1">
                            <span class="inline-block w-4 h-4 shrink-0 rounded-full bg-gray-300"></span>
                            <span>Modul 10</span>
                        </a>
                    </li>
                </ul>
            </nav>


        </aside>

        <!-- Content -->
        <section class="flex-grow bg-white border border-gray-200 rounded shadow-sm p-6 text-sm leading-relaxed">

            <!-- Video Player and Description -->
            <div class="mb-6">
                <div class="aspect-video bg-gray-300 rounded-md overflow-hidden mb-4">
                    <!-- Placeholder for video player -->
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/uIkXrHCSank" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                <h1 class="text-xl font-bold text-gray-800 mb-2">Judul Video Utama</h1>
                <p class="text-gray-600 text-sm mb-4">Deskripsi singkat tentang video ini. Ini adalah tempat untuk
                    menjelaskan isi video secara ringkas dan menarik.</p>
                <div class="flex items-center text-gray-500 text-xs">
                    <span class="mr-4">Dilihat: 1.234 kali</span>
                    <span>Tanggal Unggah: 1 Januari 2024</span>
                </div>
            </div>

            <!-- Related Videos Section -->
            <!-- <div class="border-t border-gray-200 pt-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Video Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    
                    <a href="#" class="block group">
                        <div class="aspect-video bg-gray-200 rounded-md overflow-hidden mb-2">
                            <img src="https://via.placeholder.com/320x180" alt="Thumbnail Video Terkait 1" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <h3 class="text-sm font-semibold text-gray-800 group-hover:text-blue-600 line-clamp-2">Judul Video Terkait 1 yang Cukup Panjang untuk Dua Baris</h3>
                        <p class="text-gray-500 text-xs">Nama Channel • 500x Dilihat</p>
                    </a>
                    
                    <a href="#" class="block group">
                        <div class="aspect-video bg-gray-200 rounded-md overflow-hidden mb-2">
                            <img src="https://via.placeholder.com/320x180" alt="Thumbnail Video Terkait 2" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <h3 class="text-sm font-semibold text-gray-800 group-hover:text-blue-600 line-clamp-2">Judul Video Terkait 2</h3>
                        <p class="text-gray-500 text-xs">Nama Channel • 300x Dilihat</p>
                    </a>
                    
                    <a href="#" class="block group">
                        <div class="aspect-video bg-gray-200 rounded-md overflow-hidden mb-2">
                            <img src="https://via.placeholder.com/320x180" alt="Thumbnail Video Terkait 3" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <h3 class="text-sm font-semibold text-gray-800 group-hover:text-blue-600 line-clamp-2">Judul Video Terkait 3</h3>
                        <p class="text-gray-500 text-xs">Nama Channel • 700x Dilihat</p>
                    </a>
                    
                    <a href="#" class="block group">
                        <div class="aspect-video bg-gray-200 rounded-md overflow-hidden mb-2">
                            <img src="https://via.placeholder.com/320x180" alt="Thumbnail Video Terkait 4" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <h3 class="text-sm font-semibold text-gray-800 group-hover:text-blue-600 line-clamp-2">Judul Video Terkait 4</h3>
                        <p class="text-gray-500 text-xs">Nama Channel • 250x Dilihat</p>
                    </a>
                </div>
            </div> -->

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