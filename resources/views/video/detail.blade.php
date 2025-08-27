<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">
    <title>Pengen Ngoding - detail</title>
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

<body class="bg-white text-gray-700 font-sans selection:bg-blue-600 selection:text-white">

    <!-- Header / Navbar -->
    @include('partials.header')

    <!-- Main content container -->
    <main class="max-w-4xl mx-auto px-6 pt-24 pb-10">

        <!-- Article card -->
        <article class="bg-white max-w-4xl mx-auto rounded-lg border border-slate-200 shadow-sm p-6">
            <!-- session  -->
            @auth
                <div class="flex justify-end mb-6">
                    <a href="/jpr/video/{{ encrypt($video->id ?? '') }}/edit"
                        class="flex items-center space-x-2 bg-black hover:bg-yellow-600 text-white px-4 py-2 rounded-full shadow-md transition duration-200"
                        title="Edit Artikel">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span>Edit</span>
                    </a>
                </div>
            @endauth
            <header class="flex space-x-4 mb-6 items-center">
                <!-- Gambar -->
                <div class="flex-none p-2 shadow-md shrink-0 aspect-square w-24 bg-white rounded-lg">
                    <img src="{{ filter_var($video->gambar, FILTER_VALIDATE_URL) ? $video->gambar : asset('storage/' . $video->gambar) }}" alt="{{ $video->nama }}"
                        class="w-full h-full object-contain select-none mix-blend-multiply" />
                </div>

                <!-- Judul -->
                <div class="flex-1">
                    <h1 class="text-4xl font-extrabold leading-tight text-slate-900 text-center sm:text-left">
                        {{ $video->judul }}
                    </h1>
                    <div
                        class="flex flex-wrap items-center justify-center sm:justify-start space-x-3 mt-1 text-xs text-slate-600 font-semibold">
                        <!-- Tambahkan detail lain jika perlu -->
                    </div>
                </div>
            </header>

             <div class="prose">
                {!! $video->long_deskripsi !!}
            </div>


            <section>
                <h2 class="font-semibold mb-3 text-lg text-slate-900">Daftar Bab</h2>
                <ul class="space-y-2 text-sm">
                    @foreach ($bab as $item)
                        <li>
                            <a href="{{ route('video.bab', ['id' => encrypt($video->id), 'bab_id' => encrypt($item->id)]) }}"
                                class="block border border-slate-300 rounded p-2 hover:bg-slate-50 font-semibold">
                                <code class="text-slate-500"><></code> {{ $item->judul }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </section>
            <!-- Tautan kembali -->
            <a href="{{ route('video', ['id' => encrypt($video->id)]) }}"
                class="mt-5 inline-block text-blue-500 hover:underline">
                ← Kembali
            </a>
        </article>
    </main>


    <!-- Terbaru Section -->
    <section class="bg-white w-full pt-4 pb-8 mb-16">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="font-semibold text-slate-900 mb-6 text-lg">Terbaru</h2>
            <div class="grid grid-cols-4 gap-6">
                @foreach ($kontenTerbaru as $konten)
                    <a href="{{ route('video.bab', ['id' => encrypt($konten->video->id), 'bab_id' => encrypt($konten->id)]) }}"
                        class="rounded-lg border border-gray-200 overflow-hidden shadow hover:shadow-md transition block">
                        <img src="{{ filter_var($konten->gambar, FILTER_VALIDATE_URL) ? $konten->gambar : asset('storage/' . $konten->gambar) }}"
                            class="w-full h-28 object-contain" alt="{{ $konten->video->nama }}">
                        <div class="p-4 flex flex-col gap-2">
                            <h3 class="text-sm font-semibold text-gray-800">{{ $konten->video->judul }} -
                                {{ $konten->judul }}
                            </h3>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')

</body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</html>