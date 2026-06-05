<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'menu ayam menu dapur Un\'ae')</title>
    <!-- Google Fonts: Outfit & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --color-primary-red: #9B0C0C;
            --color-primary-orange: #FF6B00;
            --color-accent-orange: #E05300;
            --color-bg-cream: #FFFBF2;
            --color-card-border: rgba(224, 83, 0, 0.08);
            --color-text-dark: #3E2723;
            --color-text-muted: #8D6E63;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--color-bg-cream);
            /* repeating transparent citrus pattern */
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140' viewBox='0 0 120 120'%3E%3Cpath d='M60,10 A50,50 0 1,0 110,60 A50,50 0 0,0 60,10 Z M60,18 A42,42 0 1,1 18,60 A42,42 0 0,1 60,18 Z' fill='%23FF6B00' fill-opacity='0.02'/%3E%3Cpath d='M60,20 L60,56 M60,64 L60,100 M20,60 L56,60 M64,60 L100,60 M31.7,31.7 L57.2,57.2 M62.8,62.8 L88.3,88.3 M31.7,88.3 L57.2,62.8 M62.8,57.2 L88.3,31.7' stroke='%23FF6B00' stroke-width='2' stroke-opacity='0.02' stroke-linecap='round'/%3E%3C/svg%3E");
            font-family: 'Outfit', 'Inter', system-ui, -apple-system, sans-serif;
            color: var(--color-text-dark);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar Navigation */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #9B0C0C 0%, #FF6B00 100%);
            display: flex;
            flex-direction: column;
            padding: 2.5rem 1.5rem 1.5rem 1.5rem;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            color: white;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .logo-img {
            max-width: 170px;
            height: auto;
            filter: drop-shadow(0 4px 10px rgba(0, 0, 0, 0.15));
        }

        .nav-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .nav-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.15);
            margin: 0.75rem 0;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            padding: 0.9rem 1.25rem;
            border-radius: 0.75rem;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .nav-item a:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(3px);
        }

        .nav-item.active a {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            font-weight: 600;
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }


        /* Image-based sidebar icon */
        .sidebar-icon {
            width: 55px;
            height: 55px;
            object-fit: contain;
            flex-shrink: 0;
            transform: scale(1.3);
            margin: -5px 0;
            transition: transform 0.2s ease;
        }

        .nav-item a:hover .sidebar-icon {
            transform: scale(1.1);
        }

        .nav-item.active a .sidebar-icon {
            transform: scale(1.1);
        }

        /* Inline SVG icons in sidebar */
        .nav-item a svg {
            width: 32px;
            height: 32px;
            margin: 0 11px;
            stroke-width: 2;
            stroke: rgba(255, 255, 255, 0.85);
            flex-shrink: 0;
            transition: stroke 0.2s ease;
        }

        .nav-item a:hover svg {
            stroke: #FFFFFF;
        }

        .nav-item.active a svg {
            stroke: var(--color-accent-orange);
        }


        .sidebar-fruit-img-container {
            margin-top: auto;
            padding-top: 2rem;
            text-align: center;
        }

        .sidebar-fruit-img {
            width: 100%;
            max-width: 190px;
            height: auto;
            border-radius: 1rem;
            filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.2));
        }

        /* Main Content Panel */
        .main-content {
            margin-left: 280px;
            flex-grow: 1;
            padding: 2rem 2.5rem;
            min-width: 0; /* Prevents flex items from overflowing */
        }

        /* Top Header Bar */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .page-title-section h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--color-primary-red);
            margin-bottom: 0.25rem;
        }

        .page-title-section p {
            font-size: 0.95rem;
            color: var(--color-text-muted);
        }

        .header-widgets {
            display: flex;
            align-items: center;
        }

        .datetime-widget {
            background: white;
            border-radius: 1.25rem;
            padding: 0.6rem 1.25rem;
            border: 1px solid var(--color-card-border);
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 4px 15px rgba(181, 129, 65, 0.05);
        }

        .datetime-section {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--color-text-dark);
        }

        .datetime-separator {
            width: 1px;
            height: 18px;
            background-color: rgba(0, 0, 0, 0.1);
        }

        .widget-svg {
            color: var(--color-text-dark);
            opacity: 0.85;
            flex-shrink: 0;
        }

        /* White rounded cards */
        .card {
            background: #FFFFFF;
            border-radius: 1.25rem;
            border: 1px solid var(--color-card-border);
            padding: 1.5rem;
            box-shadow: 0 6px 20px rgba(181, 129, 65, 0.05);
            margin-bottom: 1.5rem;
        }

        .card-title {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--color-primary-red);
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Alerts and notices */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
            line-height: 1.4;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .alert-success {
            background-color: #E8F5E9;
            color: #2E7D32;
            border: 1px solid #C8E6C9;
        }

        .alert-error {
            background-color: #FFEBEE;
            color: #C62828;
            border: 1px solid #FFCDD2;
        }

        .alert-info {
            background-color: #FFF3E0;
            color: #EF6C00;
            border: 1px solid #FFE0B2;
        }

        /* Custom buttons styling */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            border: none;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #FF6B00 0%, #E05300 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(224, 83, 0, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(224, 83, 0, 0.3);
        }

        .btn-danger {
            background: #D32F2F;
            color: white;
            box-shadow: 0 4px 12px rgba(211, 47, 47, 0.2);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(211, 47, 47, 0.3);
        }

        .btn-secondary {
            background: #FFF7E8;
            color: var(--color-accent-orange);
            border: 1px solid rgba(224, 83, 0, 0.2);
        }

        .btn-secondary:hover {
            background: #FFE0B2;
        }

        .btn-small {
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            border-radius: 0.5rem;
        }

        /* Forms */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--color-text-dark);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            border: 1px solid var(--color-card-border);
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--color-text-dark);
            background: #FAFAFA;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            background: white;
            border-color: var(--color-primary-orange);
            box-shadow: 0 0 0 3px rgba(255, 107, 0, 0.1);
        }

        /* Beautiful responsive grid utilities */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            align-items: start;
        }

        @media (max-width: 1024px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }
            .sidebar {
                width: 80px;
                padding: 2.5rem 0.5rem 1.5rem 0.5rem;
            }
            .logo-img {
                display: none;
            }
            .nav-item a {
                justify-content: center;
                padding: 0.9rem 0;
            }
            .nav-item a span {
                display: none;
            }
            .sidebar-fruit-img-container {
                display: none;
            }
            .main-content {
                margin-left: 80px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                width: 280px;
                padding: 2.5rem 1.5rem 1.5rem 1.5rem;
                transition: transform 0.3s ease;
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .logo-img {
                display: block;
            }
            .nav-item a {
                justify-content: flex-start;
                padding: 0.9rem 1.25rem;
            }
            .nav-item a span {
                display: inline;
            }
            .sidebar-fruit-img-container {
                display: block;
            }
            .main-content {
                margin-left: 0;
                padding: 1.5rem 1rem;
            }
            .top-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .header-widgets {
                width: 100%;
                justify-content: space-between;
            }
        }

        .hamburger-btn {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            margin-right: 1rem;
            color: var(--color-primary-red);
        }
        @media (max-width: 768px) {
            .hamburger-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
        }
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 99;
        }
        .sidebar-overlay.open {
            display: block;
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- SIDEBAR OVERLAY -->
    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <div class="logo-container">
            <img src="/assets/images/logo.png" alt="Dapoer Mba ReTe" class="logo-img">
        </div>

        <ul class="nav-menu">
            @if(session('role') === 'owner')
                <!-- Owner Navigation -->
                <li class="nav-item {{ Request::is('owner/dashboard') ? 'active' : '' }}">
                    <a href="/owner/dashboard">
                        <img src="/assets/images/ikondashboard.png" class="sidebar-icon"> <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-divider"></li>

                <li class="nav-item {{ Request::is('owner/cabang') ? 'active' : '' }}">
                    <a href="/owner/cabang">
                        <svg class="sidebar-icon-svg" style="width:32px;height:32px;margin: 0 11px;stroke-width:2;stroke:rgba(255,255,255,0.85);background:none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg> <span>Kelola Cabang</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('owner/pegawai') ? 'active' : '' }}">
                    <a href="/owner/pegawai">
                        <svg class="sidebar-icon-svg" style="width:32px;height:32px;margin: 0 11px;stroke-width:2;stroke:rgba(255,255,255,0.85);background:none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> <span>Kelola Pegawai</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('owner/produk') ? 'active' : '' }}">
                    <a href="/owner/produk">
                        <img src="/assets/images/ikoninput.png" class="sidebar-icon"> <span>Kelola Produk</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('owner/masakan rumah') ? 'active' : '' }}">
                    <a href="/owner/masakan rumah">
                        <img src="/assets/images/ikoninput.png" class="sidebar-icon"> <span>Kelola masakan rumah</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('owner/nasi goreng') ? 'active' : '' }}">
                    <a href="/owner/nasi goreng">
                        <img src="/assets/images/ikoninput.png" class="sidebar-icon"> <span>Kelola nasi goreng</span>
                    </a>
                </li>

                <li class="nav-divider"></li>

                <li class="nav-item {{ Request::is('owner/pengeluaran') ? 'active' : '' }}">
                    <a href="/owner/pengeluaran">
                        <img src="/assets/images/ikoninput.png" class="sidebar-icon"> <span>Input Pengeluaran</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('owner/laporan') ? 'active' : '' }}">
                    <a href="/owner/laporan">
                        <img src="/assets/images/ikonriwayatransaksi.png" class="sidebar-icon"> <span>Laporan Keuangan</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('owner/stok') ? 'active' : '' }}">
                    <a href="/owner/stok">
                        <img src="/assets/images/ikoninputsisanasi goreng.png" class="sidebar-icon"> <span>Monitoring Stok nasi goreng</span>
                    </a>
                </li>
            @elseif(session('role') === 'pegawai')
                <!-- Pegawai Navigation -->
                <li class="nav-item {{ Request::is('pegawai/dashboard') ? 'active' : '' }}">
                    <a href="/pegawai/dashboard">
                        <img src="/assets/images/ikondashboard.png" class="sidebar-icon"> <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('pegawai/transaksi') ? 'active' : '' }}">
                    <a href="/pegawai/transaksi">
                        <img src="/assets/images/ikoninput.png" class="sidebar-icon"> <span>Input Transaksi</span>
                    </a>
                </li>

                <li class="nav-divider"></li>

                <li class="nav-item {{ Request::is('pegawai/riwayat') ? 'active' : '' }}">
                    <a href="/pegawai/riwayat">
                        <img src="/assets/images/ikonriwayatransaksi.png" class="sidebar-icon"> <span>Riwayat Transaksi</span>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('pegawai/stok') ? 'active' : '' }}">
                    <a href="/pegawai/stok">
                        <img src="/assets/images/ikoninputsisanasi goreng.png" class="sidebar-icon"> <span>Input Sisa Stok nasi goreng</span>
                    </a>
                </li>
            @endif

            <li class="nav-divider"></li>

            <li class="nav-item">
                <a href="#" onclick="showLogoutModal(); return false;">
                    <svg class="sidebar-icon-svg" style="width:32px;height:32px;margin: 0 11px;stroke-width:2;stroke:rgba(255,255,255,0.85);background:none;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Keluar</span>
                </a>
            </li>
        </ul>

        <div class="sidebar-fruit-img-container">
            <img src="/assets/images/nasi goreng.png" alt="nasi goreng menu ayam Un'ae" class="sidebar-fruit-img">
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <!-- CUSTOM TOAST -->
        <div id="custom-toast" style="position: fixed; top: -100px; left: 50%; transform: translateX(-50%); background: #fff; border-bottom: 4px solid #E05300; padding: 16px 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.15); border-radius: 8px; z-index: 9999; font-weight: 600; color: #333; display: flex; align-items: center; gap: 12px; transition: top 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E05300" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
            <span id="toast-message">Notifikasi</span>
        </div>
        <!-- TOP HEADER BAR -->
        <div class="top-header">
            <div class="page-title-section" style="display: flex; align-items: center;">
                <button class="hamburger-btn" id="hamburger-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </button>
                <div>
                    <h1>@yield('page_title')</h1>
                    <p>@yield('page_subtitle')</p>
                </div>
            </div>

            <div class="header-widgets">
                <div class="datetime-widget">
                    <div class="datetime-section">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="widget-svg"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <span id="header-date">Selasa, 20 Mei 2026</span>
                    </div>
                    <div class="datetime-separator"></div>
                    <div class="datetime-section">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="widget-svg"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        <span id="header-time">10:45 WITA</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- ALERTS -->
        @if(session('success'))
            <div class="alert alert-success">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#2E7D32" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#C62828" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
                <div>{{ session('error') }}</div>
            </div>
        @endif

        @yield('content')
    </div>

    <script>
        // Update header clock and date dynamically
        function updateDateTime() {
            const now = new Date();

            // Format Date (e.g. Selasa, 20 Mei 2026)
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            const dayName = days[now.getDay()];
            const dayOfMonth = now.getDate();
            const monthName = months[now.getMonth()];
            const year = now.getFullYear();

            document.getElementById('header-date').innerText = `${dayName}, ${dayOfMonth} ${monthName} ${year}`;

            // Format Time (e.g. 10:45 WITA)
            let hours = now.getHours().toString().padStart(2, '0');
            let minutes = now.getMinutes().toString().padStart(2, '0');
            document.getElementById('header-time').innerText = `${hours}:${minutes} WITA`;
        }

        // Run clock
        updateDateTime();
        setInterval(updateDateTime, 30000);
    </script>
    <!-- CUSTOM LOGOUT MODAL -->
    <div id="logout-modal" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); backdrop-filter: blur(4px); z-index: 10000; display: none; align-items: center; justify-content: center; opacity: 0; transition: opacity 0.3s ease;">
        <div style="background: white; border-radius: 1.5rem; padding: 2rem; width: 90%; max-width: 400px; text-align: center; box-shadow: 0 20px 40px rgba(0,0,0,0.2); transform: scale(0.9); transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);" id="logout-modal-content">
            <div style="background: #FFF0E6; width: 70px; height: 70px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; color: #E05300;">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
            </div>
            <h2 style="font-size: 1.25rem; font-weight: 800; color: #333; margin-bottom: 0.5rem;">Keluar dari Aplikasi?</h2>
            <p style="color: #666; font-size: 0.95rem; margin-bottom: 2rem; line-height: 1.5;">Apakah Anda yakin ingin mengakhiri sesi ini dan keluar?</p>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <button onclick="hideLogoutModal()" style="padding: 0.85rem; border: 1.5px solid #ddd; background: white; border-radius: 0.75rem; font-weight: 700; color: #555; cursor: pointer; transition: all 0.2s;">Tutup</button>
                <a href="/logout" style="padding: 0.85rem; border: none; background: #E05300; border-radius: 0.75rem; font-weight: 700; color: white; cursor: pointer; text-decoration: none; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 12px rgba(224, 83, 0, 0.25);">Ya, Keluar</a>
            </div>
        </div>
    </div>

    @yield('scripts')
    <script>
        function showLogoutModal() {
            const modal = document.getElementById('logout-modal');
            const content = document.getElementById('logout-modal-content');
            modal.style.display = 'flex';
            // Trigger reflow
            void modal.offsetWidth;
            modal.style.opacity = '1';
            content.style.transform = 'scale(1)';
        }

        function hideLogoutModal() {
            const modal = document.getElementById('logout-modal');
            const content = document.getElementById('logout-modal-content');
            modal.style.opacity = '0';
            content.style.transform = 'scale(0.9)';
            setTimeout(() => {
                modal.style.display = 'none';
            }, 300);
        }

        // Sidebar mobile toggle
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerBtn = document.getElementById('hamburger-btn');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');

            if(hamburgerBtn && sidebar && overlay) {
                hamburgerBtn.addEventListener('click', function() {
                    sidebar.classList.add('open');
                    overlay.classList.add('open');
                });

                overlay.addEventListener('click', function() {
                    sidebar.classList.remove('open');
                    overlay.classList.remove('open');
                });
            }
        });
    </script>
</body>
</html>