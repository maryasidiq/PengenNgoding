<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Pengen Ngoding</title>
    <link rel="icon" href="{{ asset('images/logo_pengen_ngoding.png') }}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, .8);
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, .1);
        }

        .sidebar .nav-link.active {
            color: white;
            background-color: rgba(255, 255, 255, .2);
        }

        .main-content {
            margin-left: 250px;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        trix-editor.form-control {
            min-height: 300px;
            /* tinggi awal diperbesar */
            padding: 12px;
            /* jarak dalam biar lega */
            font-size: 14px;
            /* ukuran teks nyaman */
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }
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

<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="p-3">
            <h4 class="text-white text-center mb-4">Admin Panel</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.portofolio.*') ? 'active' : '' }}"
                        href="{{ route('admin.portofolio.index') }}">
                        <i class="fas fa-briefcase me-2"></i>Portofolio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.client.*') ? 'active' : '' }}"
                        href="{{ route('admin.client.index') }}">
                        <i class="fas fa-users me-2"></i>Client
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.artikel.*') ? 'active' : '' }}"
                        href="{{ route('admin.artikel.index') }}">
                        <i class="fas fa-newspaper me-2"></i>Artikel
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.tips.*') ? 'active' : '' }}"
                        href="{{ route('admin.tips.index') }}">
                        <i class="fas fa-lightbulb me-2"></i>Tips
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.video.*') ? 'active' : '' }}"
                        href="{{ route('admin.video.index') }}">
                        <i class="fas fa-video me-2"></i>Video
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link text-danger" href="{{ route('beranda') }}">
                        <i class="fas fa-sign-out-alt me-2"></i>Kembali ke Website
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container-fluid">
                <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="ms-auto d-flex align-items-center">
                    <span class="me-3">Welcome, {{ auth()->check() ? auth()->user()->name : 'Guest' }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- rich text editor -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>

    <script>
        document.addEventListener("trix-toolbar-ready", function (event) {
            const buttonHTML = '<button type="button" class="trix-button" data-trix-action="code" title="Code Block">&lt;/&gt;</button>';
            const group = event.target.querySelector(".trix-button-group.trix-button-group--block-tools");
            group.insertAdjacentHTML("beforeend", buttonHTML);
        });

        // Aksi tombol custom
        document.addEventListener("trix-action-invoke", function (event) {
            if (event.actionName === "code") {
                let editor = event.target.editor;
                let selectedText = editor.getSelectedDocument().toString();
                editor.insertHTML(`<pre><code>${selectedText || "/* your code */"}</code></pre>`);
            }
        });
    </script>

    @stack('scripts')
</body>

</html>