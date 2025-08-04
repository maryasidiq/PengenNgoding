<!-- Header / Navbar -->
    <nav x-data="{ mobileOpen: false }" class="bg-white shadow-md fixed w-full z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between py-4 px-5 md:px-10">
            <!-- Logo -->
            <a href="#" class="flex items-center space-x-2">
                <img src="{{ url('/') }}/images/logo.png" class="h-10 w-auto" alt="Logo Pengen Ngoding">
            </a>

            <!-- Hamburger (Mobile Only) -->
            <button @click="mobileOpen = !mobileOpen" class="md:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path :class="{ 'hidden': mobileOpen }" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M4 8h16M4 16h16" />
                    <path :class="{ 'hidden': !mobileOpen }" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Menu Desktop -->
            <ul class="hidden md:flex space-x-6 text-sm font-semibold text-gray-700">
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

                <li><a href="#kerjasama" class="hover:text-indigo-600 transition">KERJASAMA</a></li>
                <li><a href="#portfolio" class="hover:text-indigo-600 transition">PORTFOLIO</a></li>
                <li><a href="{{ route('ttg_kami') }}" class="block hover:text-indigo-600">TENTANG KAMI</a></li>
            </ul>
        </div>

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