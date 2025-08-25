<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">
    <title>Pengen Ngoding - Artikel 1</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html {
            scroll-behavior: smooth;
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

        /* Custom scrollbar for sidebar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background-color: #a78bfa;
            border-radius: 3px;
        }


        /* Code block */
        .code-block {
            background-color: #f3f4f6;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            font-family: 'Source Code Pro', monospace;
            font-size: 0.875rem;
            /* 14px */
            line-height: 1.25rem;
            /* 20px */
            padding: 1rem;
            overflow-x: auto;
            margin-top: 0.5rem;
            margin-bottom: 1.5rem;
            white-space: pre-wrap;
            /* Wrap code lines responsively */
            word-break: break-word;
            /* Prevent horizontal overflow on long text */
            max-width: 100%;
            /* Ensure it fits container */
            box-sizing: border-box;
        }

        /* Optional: Improve scrolling UX on mobile */
        @media (max-width: 768px) {
            .code-block {
                font-size: 0.8125rem;
                /* Sedikit lebih kecil untuk layar kecil */
                padding: 0.75rem;
            }

            .sidebar {
                overflow-x: auto;
                /* jika sidebar horizontal */
                max-width: 100vw;
            }
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
    </style>
</head>

<body class="bg-white text-gray-700 font-sans selection:bg-blue-600 selection:text-white">

    <!-- Header / Navbar -->
    @include('partials.header')

    <main class="container mx-auto px-4 md:px-6 lg:flex lg:space-x-8 pt-24 sm:pt-28 max-w-7xl">

        <!-- Main content area -->
        <article class="lg:flex-1 max-w-3xl mx-auto lg:mx-0 pb-10 sm:pb-16 lg:pb-20">
            @auth
                <div class="mb-4">
                    <a href="{{ route('admin.artikel.konten.edit', ['artikel' => $artikel->id, 'konten' => $bab->id]) }}"
                        class="inline-flex items-center space-x-2 bg-black hover:bg-yellow-600 text-white px-4 py-2 rounded-full shadow-md transition duration-200"
                        title="Edit Artikel">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414
                   a2 2 0 112.828 2.828L11.828 15H9v-2.828
                   l8.586-8.586z" />
                        </svg>
                        <span>Edit</span>
                    </a>
                </div>
            @endauth

            <h1 class="font-bold text-2xl sm:text-3xl mb-4">
                {{ $bab->judul }}
            </h1>

            <section class="mb-8">
                <div class="prose max-w-none text-gray-700">
                    {!! $bab->deskripsi !!}
                </div>

                <a href="{{ route('artikel.detail', ['id' => $artikel->id]) }}"
                    class="mt-5 inline-block text-blue-500 hover:underline">← Kembali ke daftar bab</a>


            </section>

            <!-- Daftar Isi untuk Mobile & Tablet -->
            <div class="block lg:hidden px-4 pt-4 pb-1">
                <div class="mb-3 border border-gray-200 rounded-md p-4 bg-white shadow-sm">
                    <h2 class="font-semibold text-lg mb-3 border-b border-gray-300 pb-1">Daftar Isi</h2>
                    <ul class="list-decimal list-inside space-y-2 text-sm text-gray-700 font-semibold block">
                        @foreach ($artikel->konten as $item)
                            <li>
                                <a href="{{ route('artikel.bab', ['id' => $artikel->id, 'bab_id' => $item->id]) }}"
                                    class="hover:text-blue-600 transition-all duration-200">
                                    {{ $item->judul }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <!-- Tutorial terbaru untuk Mobile & Tablet -->
            <div class="block lg:hidden px-4 pt-4 pb-1">
                <div class="mb-3 border border-gray-200 rounded-md p-4 bg-white shadow-sm">
                    <h2 class="font-semibold text-lg border-b border-gray-300 pb-1 mb-3">Tutorial Terbaru</h2>
                    <ul class="space-y-2 text-sm">
                        @foreach ($kontenTerbaru as $konten)
                            <li class="flex items-center space-x-3">
                                <span class="inline-block px-2 py-1 rounded font-semibold">
                                    <img src="{{ filter_var($konten->artikel->gambar, FILTER_VALIDATE_URL) ? $konten->artikel->gambar : asset('storage/' . $konten->artikel->gambar) }}"
                                        class="w-12 h-12 select-none">
                                </span>
                                <a href="{{ route('artikel.bab', ['id' => $konten->artikel_id, 'bab_id' => $konten->id]) }}"
                                    class="hover:underline text-gray-700">
                                    {{ $konten->judul }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>



        </article>

        <!-- Sidebar -->
        <aside id="mobileSidebar"
            class="fixed top-0 left-0 w-72 h-full z-40 bg-white transform -translate-x-full transition-transform duration-300 ease-in-out 
         shadow-lg p-4 overflow-y-auto border-r border-gray-200
         lg:relative lg:translate-x-0 lg:block lg:border-l lg:border-r-0 lg:top-16 lg:max-h-[calc(100vh_-_4rem)] sidebar">

            <div class="mb-6">
                <h2 class="font-semibold text-lg mb-3 border-b border-gray-300 pb-1">Daftar Isi</h2>
                <ul class="list-decimal list-inside space-y-2 text-sm text-gray-700 font-semibold block">
                    @foreach ($artikel->konten as $item)
                        <li>
                            <a href="{{ route('artikel.bab', ['id' => $artikel->id, 'bab_id' => $item->id]) }}"
                                class="hover:text-blue-600 transition-all duration-200 ">
                                {{ $item->judul }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-6">
                <h2 class="font-semibold text-lg border-b border-gray-300 pb-1 mb-3">Tutorial Terbaru</h2>
                <ul class="space-y-2 text-sm">
                    @foreach ($kontenTerbaru as $konten)
                        <li class="flex items-center space-x-3">
                            <span class="inline-block px-2 py-1 rounded font-semibold">
                                <img src="{{ filter_var($konten->artikel->gambar, FILTER_VALIDATE_URL) ? $konten->artikel->gambar : asset('storage/' . $konten->artikel->gambar) }}"
                                    class="w-12 h-12 select-none">
                            </span>
                            <a href="{{ route('artikel.bab', ['id' => $konten->artikel_id, 'bab_id' => $konten->id]) }}"
                                class="hover:underline text-gray-700">
                                {{ $konten->judul }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>
        </aside>
    </main>




    <!-- Footer -->
    @include('partials.footer')

</body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    const toggleBtn = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("mobileSidebar");

    toggleBtn?.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
    });
</script>

</html>