<!-- Header / Navbar -->
<nav x-data="{ mobileOpen: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 50" :class="{ 
        'bg-[rgba(192,192,192,0.4)] text-gray-800': scrolled, 
        'bg-white shadow-md text-gray-700': !scrolled 
    }" class="fixed w-full z-50 transition-all duration-300">

    <!-- <nav x-data="{ mobileOpen: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 50"
    :class="{ 'bg-transparent text-gray-600': scrolled, 'bg-white shadow-md text-gray-700': !scrolled }"
    class="fixed w-full z-50 transition-all duration-300"> -->

    <div class="max-w-7xl mx-auto flex items-center justify-between py-3 px-4 md:py-4 md:px-10">
        <!-- Logo -->
        <a href="{{ route('beranda') }}" class="flex items-center space-x-2">
            <img src="{{ url('/') }}/images/logo.png" class="h-8 w-auto md:h-10" alt="Logo Pengen Ngoding">
        </a>

        <!-- Hamburger (Mobile Only) -->
        <button @click="mobileOpen = !mobileOpen" class="md:hidden focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" :class="{ 'text-gray-600': scrolled, 'text-gray-700': !scrolled }"
                class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path :class="{ 'hidden': mobileOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 8h16M4 16h16" />
                <path :class="{ 'hidden': !mobileOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Menu Desktop -->
        <ul class="hidden md:flex space-x-6 text-sm font-semibold">
            <li><a href="{{ route('beranda') }}" class="hover:text-indigo-600 transition">BERANDA</a></li>

            <!-- Dropdown Desktop -->
            <li x-data="{ open: false }" class="relative">
                <button @click="open = !open"
                    class="hover:text-indigo-600 transition flex items-center focus:outline-none">
                    BLOG
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>
                <ul x-show="open" @click.away="open = false" x-transition
                    class="absolute bg-white text-gray-700 shadow-md rounded mt-2 py-1 w-40 z-50">
                    <li><a href="{{ route('artikel') }}" class="block px-4 py-2 hover:bg-indigo-50">Artikel</a></li>
                    <li><a href="{{ route('tips') }}" class="block px-4 py-2 hover:bg-indigo-50">Tips</a></li>
                    <li><a href="{{ route('video') }}" class="block px-4 py-2 hover:bg-indigo-50">Video</a></li>
                </ul>
            </li>

            <li><a href="/#kerjasama" class="hover:text-indigo-600 transition">KERJASAMA</a></li>
            <li><a href="/#portfolio" class="hover:text-indigo-600 transition">PORTFOLIO</a></li>
            <li><a href="{{ route('ttg_kami') }}" class="hover:text-indigo-600 block">TENTANG KAMI</a></li>
        </ul>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileOpen" x-transition
        class="md:hidden px-4 pt-3 pb-4 space-y-2 bg-white text-xs font-semibold text-gray-700">
        <a href="{{ route('beranda') }}" class="block hover:text-indigo-600 py-1">BERANDA</a>
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full text-left flex items-center justify-between hover:text-indigo-600 py-1">
                BLOG
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </button>
            <div x-show="open" x-transition class="mt-1 pl-3 space-y-1">
                <a href="{{ route('artikel') }}" class="block hover:text-indigo-600 py-1">Artikel</a>
                <a href="{{ route('tips') }}" class="block hover:text-indigo-600 py-1">Tips</a>
                <a href="{{ route('video') }}" class="block hover:text-indigo-600 py-1">Video</a>
            </div>
        </div>
        <a href="/#kerjasama" class="block hover:text-indigo-600 py-1">KERJASAMA</a>
        <a href="/#portfolio" class="block hover:text-indigo-600 py-1">PORTFOLIO</a>
        <a href="{{ route('ttg_kami') }}" class="block hover:text-indigo-600 py-1">TENTANG KAMI</a>
    </div>
</nav>

<script>
    // Inisialisasi Alpine.js untuk header scroll effect
    document.addEventListener('alpine:init', () => {
        Alpine.data('header', () => ({
            scrolled: false,
            init() {
                // Set initial state based on scroll position
                // Header putih di atas (scrolled = false), transparan saat scroll (scrolled = true)
                this.scrolled = window.scrollY > 50;

                // Listen for scroll events
                window.addEventListener('scroll', () => {
                    this.scrolled = window.scrollY > 50;
                });
            }
        }));
    });
</script>