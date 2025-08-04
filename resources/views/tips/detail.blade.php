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
    </style>
</head>

<body class="bg-white text-gray-700 font-sans selection:bg-blue-600 selection:text-white">

    <!-- Header / Navbar -->
    @include('partials.header')

    <!-- Main content container -->
    <main class="max-w-4xl mx-auto px-6 pt-24 pb-10">

        <!-- Article card -->
        <article class="bg-white max-w-4xl mx-auto rounded-lg border border-slate-200 shadow-sm p-6">
            <header class="flex space-x-4 mb-6 items-center">
                <!-- Gambar -->
                <div class="flex-none p-2 shadow-md shrink-0 aspect-square w-24 bg-white rounded-lg">
                    <img src="{{ url($tips->gambar) }}" alt="{{ $tips->nama }}"
                        class="w-full h-full object-contain select-none mix-blend-multiply" />
                </div>

                <!-- Judul -->
                <div class="flex-1">
                    <h1 class="text-4xl font-extrabold leading-tight text-slate-900 text-center sm:text-left">
                        {{ $tips->judul }}
                    </h1>
                    <div
                        class="flex flex-wrap items-center justify-center sm:justify-start space-x-3 mt-1 text-xs text-slate-600 font-semibold">
                        <!-- Tambahkan detail lain jika perlu -->
                    </div>
                </div>
            </header>

            <p class="mb-6 text-slate-700 leading-relaxed text-sm sm:text-base max-w-none">
                {!! $tips->long_deskripsi !!}
            </p>

            <section>
                <h2 class="font-semibold mb-3 text-lg text-slate-900">Daftar Bab</h2>
                <ul class="space-y-2 text-sm">
                    @foreach ($bab as $item)
                        <li>
                            <a href="{{ route('tips.bab', ['id' => $tips->id, 'bab_id' => $item->id]) }}"
                                class="block border border-slate-300 rounded p-2 hover:bg-slate-50 font-semibold">
                                <code class="text-slate-500"><></code> {{ $item->judul }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </section>
            <!-- Tautan kembali -->
            <a href="{{ route('tips', ['id' => $tips->id]) }}"
                class="mt-5 inline-block text-blue-500 hover:underline">
                ← Kembali
            </a>
        </article>
    </main>


    <!-- Terbaru Section -->
    <section class="bg-white w-full pt-4 pb-8 mb-16">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="font-semibold text-slate-900 mb-6 text-lg">Terbaru</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <a href="#">
                    <article
                        class="bg-white border border-slate-200 rounded shadow-sm overflow-hidden hover:shadow-lg transition-shadow cursor-pointer h-full flex flex-col">
                        <div class="bg-yellow-300 h-28 flex items-center justify-center px-4 relative">
                            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/7747478f-6ce3-4b91-8d49-44745c6ac0f5.png"
                                alt="Game Tebak Angka" class="object-contain h-20 w-full" />
                            <span class="absolute top-1 left-2 text-[10px] font-semibold text-black select-none">Game
                                Tebak Angka</span>
                        </div>
                        <div class="p-3 flex-1 flex flex-col justify-between">
                            <span class="text-xs text-blue-600 font-semibold uppercase select-none">JavaScript</span>
                            <h3 class="mt-1 font-semibold text-slate-900 text-sm leading-tight">Membuat Game Tebak Angka
                                Dengan JavaScript</h3>
                        </div>
                    </article>
                </a>

                <!-- Card 2 -->
                <a href="#">
                    <article
                        class="bg-white border border-slate-200 rounded shadow-sm overflow-hidden hover:shadow-lg transition-shadow cursor-pointer h-full flex flex-col">
                        <div class="bg-[#1B3A59] h-28 flex items-center justify-center px-4 relative">
                            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/aa98e807-a45c-4aef-8a37-5a3d5e2c317f.png"
                                alt="Form Login PHP" class="object-contain h-20 w-full" />
                        </div>
                        <div class="p-3 flex-1 flex flex-col justify-between">
                            <span class="text-xs text-blue-600 font-semibold uppercase select-none">PHP</span>
                            <h3 class="mt-1 font-semibold text-slate-900 text-sm leading-tight">Membuat Form Login
                                Dengan PHP Tanpa Database</h3>
                        </div>
                    </article>
                </a>

                <!-- Card 3 & 4 (Git) -->
                <a href="#">
                    <article
                        class="bg-white border border-slate-200 rounded shadow-sm overflow-hidden hover:shadow-lg transition-shadow cursor-pointer h-full flex flex-col ">
                        <div class="bg-gray-800 h-28 flex items-center justify-center px-4 relative">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg"
                                alt="Git Icon" class="w-8 h-8 select-none">
                        </div>
                        <div class="p-3 flex-1 flex flex-col justify-between">
                            <span class="text-xs text-blue-600 font-semibold uppercase select-none">Git</span>
                            <h3 class="mt-1 font-semibold text-slate-900 text-sm leading-tight">Tutorial Git #7 :
                                Membuat Cabang atau Branch Pada Git</h3>
                        </div>
                    </article>
                </a>

                <a href="#">
                    <article
                        class="bg-white border border-slate-200 rounded shadow-sm overflow-hidden hover:shadow-lg transition-shadow cursor-pointer h-full flex flex-col ">
                        <div class="bg-gray-800 h-28 flex items-center justify-center px-4 relative">
                            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/git/git-original.svg"
                                alt="Git Icon" class="w-8 h-8 select-none">
                        </div>
                        <div class="p-3 flex-1 flex flex-col justify-between">
                            <span class="text-xs text-blue-600 font-semibold uppercase select-none">Git</span>
                            <h3 class="mt-1 font-semibold text-slate-900 text-sm leading-tight">Tutorial Git #6 :
                                Membatalkan Revisi Git</h3>
                        </div>
                    </article>
                </a>
            </div>
        </div>
    </section>


    <!-- Footer -->
    @include('partials.footer')

</body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</html>