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


    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-6 pt-24 pb-10">

        <section class="mb-16">
            <p class="text-teal-700 font-semibold text-xs uppercase tracking-wide mb-2 select-none">SEMUA KATEGORI</p>
            <h1 class="text-3xl font-extrabold text-slate-900 mb-2">Kategori apa nih yang menarik perhatianmu?</h1>
            <p class="text-slate-700 max-w-xl mb-8">Ayo temukan kategori sesuai apa yang kamu innginkan.</p>



            <div class="flex flex-wrap gap-3 text-sm font-medium text-slate-800">
                @foreach ($kategori as $item)
                    @php
                        $jumlah = \App\Models\tipsModel::where('kategori', $item->kategori)->count();
                    @endphp

                    <a href="{{ route('konten_kategori', ['kategori' => $item->kategori]) }}"
                        class="border border-slate-300 rounded-md px-3 py-1 flex items-center space-x-2 hover:bg-teal-50 hover:border-teal-600 transition focus:outline-none focus:ring-2 focus:ring-teal-600">
                        <span>{{ $item->kategori }}</span>
                        <span class="bg-slate-200 text-slate-600 rounded-full px-2 py-0.5 text-xs select-none">
                            {{ $jumlah }}
                        </span>
                    </a>
                @endforeach
            </div>


        </section>

        <section>
            <div class="bg-white shadow rounded-lg p-6 max-w-xl">
                <p class="text-teal-700 font-semibold text-xs uppercase tracking-wide mb-2 select-none">REQUEST</p>
                <h2 class="text-2xl font-bold text-slate-900 mb-2">Tidak menemukan Kategori yang kamu cari?</h2>
                <p class="text-slate-700 mb-4">Silakan buat request agar kami bisa menambahkan.</p>
                <button
                    class="bg-teal-600 hover:bg-teal-500 text-white text-sm font-semibold px-4 py-2 rounded transition focus:outline-none focus:ring-2 focus:ring-teal-600 focus:ring-offset-1">Request
                    Kategori Baru</button>
            </div>
        </section>
        <a href="{{ route('tips') }}" class="mt-5 inline-block text-blue-500 hover:underline">
            ← Kembali
        </a>


    </main>

    <!-- Footer -->
    @include('partials.footer')
</body>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</html>