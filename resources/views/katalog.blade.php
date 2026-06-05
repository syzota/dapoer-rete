<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog - Dapoer Mba ReTe</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --red-dark: #5B1518;
            --red-main: #8F1018;
            --orange: #F05A00;
            --orange-dark: #D94700;
            --cream: #F8F6D5;
            --yellow-soft: #F2F0A8;
            --text-dark: #441619;
            --white: #FFFFFF;
            --shadow-soft: 0 24px 70px rgba(81, 42, 18, 0.14);
            --shadow-card: 0 18px 45px rgba(81, 42, 18, 0.11);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-height: 100vh;
            font-family: 'Outfit', sans-serif;
            color: var(--text-dark);
            background:
                linear-gradient(rgba(197, 197, 125, 0.38), rgba(255, 255, 235, 0.66)),
                url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='140' height='140' viewBox='0 0 120 120'%3E%3Cpath d='M60,10 A50,50 0 1,0 110,60 A50,50 0 0,0 60,10 Z M60,18 A42,42 0 1,1 18,60 A42,42 0 0,1 60,18 Z' fill='%23FF6B00' fill-opacity='0.08'/%3E%3Cpath d='M60,20 L60,56 M60,64 L60,100 M20,60 L56,60 M64,60 L100,60 M31.7,31.7 L57.2,57.2 M62.8,62.8 L88.3,88.3 M31.7,88.3 L57.2,62.8 M62.8,57.2 L88.3,31.7' stroke='%23FF6B00' stroke-width='2' stroke-opacity='0.08' stroke-linecap='round'/%3E%3C/svg%3E");
            background-size: cover, 140px 140px;
            background-position: center, center;
            background-repeat: no-repeat, repeat;
            overflow-x: hidden;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .container {
            width: min(1160px, calc(100% - 40px));
            margin: 0 auto;
        }

        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: 0.7s ease;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .navbar {
            position: sticky;
            top: 18px;
            z-index: 100;
            padding-top: 18px;
        }

        .nav-card {
            min-height: 76px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.74);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 18px 45px rgba(81, 42, 18, 0.10);
            backdrop-filter: blur(12px);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 18px 12px 20px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
            color: var(--red-dark);
            white-space: nowrap;
        }

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 24px;
            font-size: 14px;
            font-weight: 700;
            color: rgba(68, 22, 25, 0.72);
        }

        .nav-links a:hover {
            color: var(--orange);
        }

        .btn {
            min-height: 44px;
            border: none;
            border-radius: 999px;
            padding: 0 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.22s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: white;
            box-shadow: 0 16px 30px rgba(171, 45, 0, 0.24);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 40px rgba(171, 45, 0, 0.32);
        }

        .btn-soft {
            background: var(--yellow-soft);
            color: var(--red-dark);
        }

        .hero {
            padding: 74px 0 42px;
        }

        .hero-box {
            border-radius: 38px;
            padding: 44px;
            background: linear-gradient(135deg, rgba(255,255,255,0.82), rgba(248,246,213,0.78));
            box-shadow: var(--shadow-soft);
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 34px;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(242, 240, 168, 0.75);
            color: var(--red-dark);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .hero-title {
            font-size: clamp(42px, 5.2vw, 72px);
            line-height: 0.98;
            letter-spacing: -2px;
            color: var(--red-dark);
            margin-bottom: 18px;
        }

        .hero-title span {
            color: var(--orange);
        }

        .hero-desc {
            max-width: 620px;
            font-size: 16px;
            line-height: 1.75;
            color: rgba(68, 22, 25, 0.72);
            margin-bottom: 24px;
        }

        .hero-image {
            aspect-ratio: 1 / 1;
            border-radius: 32px;
            overflow: hidden;
            box-shadow: 0 24px 60px rgba(81, 42, 18, 0.18);
            transform: rotate(2deg);
            background: var(--cream);
        }

        .hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .category-nav {
            position: sticky;
            top: 112px;
            z-index: 80;
            padding: 14px 0 8px;
        }

        .category-toggle {
            display: none;
        }

        .category-nav-inner {
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.82);
            border: 1px solid rgba(255,255,255,0.9);
            box-shadow: 0 12px 30px rgba(81, 42, 18, 0.09);
            backdrop-filter: blur(12px);
            padding: 10px;
            display: flex;
            gap: 8px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .category-nav-inner::-webkit-scrollbar {
            display: none;
        }

        .category-link {
            flex: 0 0 auto;
            min-height: 40px;
            padding: 0 16px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: rgba(68, 22, 25, 0.72);
            font-weight: 800;
            font-size: 13px;
            transition: 0.2s ease;
        }

        .category-link:hover,
        .category-link.is-active {
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: white;
        }

        .section {
            padding: 70px 0;
            scroll-margin-top: 160px;
        }

        .section-head {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 28px;
        }

        .section-kicker {
            color: var(--orange);
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            margin-bottom: 10px;
        }

        .section-title {
            color: var(--red-dark);
            font-size: clamp(30px, 4vw, 46px);
            line-height: 1.12;
            letter-spacing: -0.8px;
            margin-bottom: 10px;
        }

        .section-desc {
            max-width: 680px;
            font-size: 15px;
            line-height: 1.7;
            color: rgba(68, 22, 25, 0.70);
        }

        .section-count {
            flex: 0 0 auto;
            padding: 12px 16px;
            border-radius: 999px;
            background: rgba(242, 240, 168, 0.75);
            color: var(--red-dark);
            font-size: 13px;
            font-weight: 800;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .product-card {
            position: relative;
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.84);
            box-shadow: var(--shadow-card);
            padding: 16px;
            overflow: hidden;
            transition: 0.25s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 26px 55px rgba(81, 42, 18, 0.16);
        }

        .product-img {
            aspect-ratio: 1 / 1;
            width: 100%;
            border-radius: 22px;
            overflow: hidden;
            background: var(--cream);
            margin-bottom: 15px;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .product-card h3 {
            color: var(--red-dark);
            font-size: 18px;
            line-height: 1.25;
            margin-bottom: 8px;
        }

        .product-card p {
            color: rgba(68, 22, 25, 0.66);
            font-size: 13px;
            line-height: 1.55;
            margin-bottom: 14px;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .product-price {
            color: var(--orange);
            font-size: 15px;
            font-weight: 800;
        }

        .product-label {
            padding: 7px 10px;
            border-radius: 999px;
            background: rgba(242, 240, 168, 0.78);
            color: var(--red-dark);
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        .empty-box {
            border-radius: 26px;
            padding: 28px;
            background: rgba(255,255,255,0.78);
            box-shadow: var(--shadow-card);
            color: rgba(68, 22, 25, 0.66);
            line-height: 1.6;
        }

        .footer {
            margin-top: 70px;
            background: var(--red-dark);
            color: white;
            padding: 36px 0;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
        }

        .footer-brand img {
            width: 44px;
            height: 44px;
            object-fit: contain;
        }

        .footer-links {
            display: flex;
            gap: 18px;
            color: rgba(255, 255, 255, 0.72);
            font-size: 14px;
            font-weight: 600;
        }

        .credit-trigger {
            min-height: 40px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 999px;
            padding: 0 15px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.10);
            color: rgba(255, 255, 255, 0.82);
            font-family: inherit;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .credit-trigger:hover {
            background: rgba(255, 255, 255, 0.18);
            color: white;
            transform: translateY(-2px);
        }

        .credit-modal {
            position: fixed;
            inset: 0;
            z-index: 999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 22px;
        }

        .credit-modal.is-open {
            display: flex;
        }

        .credit-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(36, 10, 12, 0.58);
            backdrop-filter: blur(8px);
        }

        .credit-card {
            position: relative;
            z-index: 1;
            width: min(520px, 100%);
            max-height: calc(100vh - 44px);
            overflow-y: auto;
            border-radius: 30px;
            padding: 30px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(248, 246, 213, 0.94));
            box-shadow: 0 30px 90px rgba(36, 10, 12, 0.30);
            color: var(--text-dark);
            animation: creditPop 0.25s ease;
        }

        .credit-close {
            position: absolute;
            top: 18px;
            right: 18px;
            width: 38px;
            height: 38px;
            border: none;
            border-radius: 50%;
            background: rgba(91, 21, 24, 0.08);
            color: var(--red-dark);
            cursor: pointer;
            transition: 0.2s ease;
        }

        .credit-close:hover {
            background: var(--red-dark);
            color: white;
        }

        .credit-icon {
            width: 58px;
            height: 58px;
            border-radius: 20px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: white;
            font-size: 22px;
            margin-bottom: 16px;
            box-shadow: 0 16px 30px rgba(171, 45, 0, 0.22);
        }

        .credit-kicker {
            color: var(--orange);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 8px;
        }

        .credit-card h3 {
            color: var(--red-dark);
            font-size: 28px;
            line-height: 1.15;
            margin-bottom: 10px;
        }

        .credit-desc {
            color: rgba(68, 22, 25, 0.68);
            line-height: 1.65;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .credit-team {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 20px;
        }

        .credit-team div {
            border-radius: 18px;
            padding: 14px;
            background: rgba(255, 255, 255, 0.74);
            border: 1px solid rgba(91, 21, 24, 0.08);
        }

        .credit-team strong {
            display: block;
            color: var(--red-dark);
            font-size: 14px;
            margin-bottom: 4px;
        }

        .credit-team span {
            color: rgba(68, 22, 25, 0.62);
            font-size: 12px;
            font-weight: 700;
        }

        .credit-cta {
            border-radius: 22px;
            padding: 18px;
            background: linear-gradient(135deg, rgba(166, 13, 25, 0.94), rgba(240, 90, 0, 0.94));
            color: white;
        }

        .credit-cta p {
            color: rgba(255, 255, 255, 0.86);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 14px;
        }

        .credit-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .credit-actions a {
            min-height: 42px;
            padding: 0 14px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.16);
            color: white;
            font-size: 13px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .credit-actions a:hover {
            background: rgba(255, 255, 255, 0.24);
            transform: translateY(-2px);
        }

        body.modal-open {
            overflow: hidden;
        }

        @keyframes creditPop {
            from {
                opacity: 0;
                transform: translateY(14px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @media (max-width: 980px) {
            .hero-box {
                grid-template-columns: 1fr;
            }

            .hero-image {
                transform: none;
                max-width: 520px;
            }

            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .section-head {
                align-items: start;
                flex-direction: column;
            }
        }

        @media (max-width: 720px) {
            .container {
                width: min(100% - 28px, 1160px);
            }

            .navbar {
                top: 10px;
                padding-top: 10px;
            }

            .nav-card {
                min-height: 68px;
                padding: 10px 12px 10px 14px;
                border-radius: 26px;
            }

            .nav-links {
                display: none;
            }

            .brand {
                font-size: 14px;
                white-space: normal;
                line-height: 1.15;
            }

            .brand img {
                width: 42px;
                height: 42px;
            }

            .hero {
                padding: 46px 0 26px;
            }

            .hero-box {
                padding: 24px;
                border-radius: 28px;
            }

            .hero-title {
                font-size: 39px;
                letter-spacing: -1px;
            }

            .hero-desc {
                font-size: 15px;
            }

            .category-nav {
                top: 88px;
            }

            .category-nav-inner {
                border-radius: 24px;
            }

            .section {
                padding: 52px 0;
                scroll-margin-top: 140px;
            }

            .section-title {
                font-size: 30px;
            }

            .product-grid {
                grid-template-columns: 1fr;
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
            }

            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
            }

            .category-nav {
                top: 88px;
                padding: 10px 0 8px;
            }

            .category-toggle {
                width: 100%;
                min-height: 54px;
                border: 1px solid rgba(255,255,255,0.9);
                border-radius: 22px;
                padding: 0 18px;
                background: rgba(255, 255, 255, 0.86);
                box-shadow: 0 12px 30px rgba(81, 42, 18, 0.10);
                backdrop-filter: blur(12px);
                color: var(--red-dark);
                font-family: inherit;
                font-size: 15px;
                font-weight: 800;
                display: flex;
                align-items: center;
                justify-content: space-between;
                cursor: pointer;
            }

            .category-toggle span {
                display: inline-flex;
                align-items: center;
                gap: 9px;
            }

            .category-toggle i {
                color: var(--orange);
            }

            .category-nav-inner {
                display: none;
                margin-top: 10px;
                border-radius: 22px;
                padding: 10px;
                flex-direction: column;
                overflow: hidden;
                background: rgba(255, 255, 255, 0.92);
                animation: categoryDropdown 0.25s ease;
            }

            .category-nav-inner.is-open {
                display: flex;
            }

            .category-link {
                width: 100%;
                min-height: 48px;
                justify-content: flex-start;
                border-radius: 16px;
                padding: 0 15px;
                font-size: 14px;
            }

            .category-link:hover,
            .category-link.is-active {
                background: rgba(242, 240, 168, 0.78);
                color: var(--orange);
            }

            .credit-card {
                padding: 24px;
                border-radius: 26px;
            }

            .credit-team {
                grid-template-columns: 1fr;
            }

            .credit-actions a {
                width: 100%;
                justify-content: center;
            }

            @keyframes categoryDropdown {
                from {
                    opacity: 0;
                    transform: translateY(-8px) scale(0.98);
                }

                to {
                    opacity: 1;
                    transform: translateY(0) scale(1);
                }
            }

        }
    </style>
</head>
<body>

@php
    $imageUrl = function ($path, $fallback = 'assets/images/logo.png') {
        if (!$path) {
            return asset($fallback);
        }

        $path = str_replace('\\', '/', $path);
        $path = preg_replace('/^public\//', '', $path);

        return asset($path);
    };

    $formatRupiah = function ($value) {
        if ($value === null || $value === '') {
            return null;
        }

        return 'Rp ' . number_format((float) $value, 0, ',', '.');
    };

    $sections = [
        [
            'id' => 'nasi-goreng',
            'icon' => 'fa-solid fa-bowl-rice',
            'kicker' => 'Menu Nasi Goreng',
            'title' => 'Pilihan nasi goreng khas Dapoer Mba ReTe.',
            'desc' => 'Dari nasi goreng kampung sampai varian tom yam dan XO, pilih menu nasi goreng yang paling cocok buat selera kamu.',
            'items' => $nasiGoreng,
            'type' => 'produk',
        ],
        [
            'id' => 'ayam-goreng',
            'icon' => 'fa-solid fa-drumstick-bite',
            'kicker' => 'Menu Ayam',
            'title' => 'Menu ayam gurih yang cocok buat makan kenyang.',
            'desc' => 'Pilihan ayam penyet, ayam sambel ijo, dan ayam serundeng dengan rasa rumahan yang hangat dan nagih.',
            'items' => $ayamGoreng,
            'type' => 'produk',
        ],
    ];

@endphp

<header class="navbar">
    <div class="container">
        <div class="nav-card">
            <a href="/" class="brand">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Dapoer Mba ReTe">
                <span>Dapoer Mba ReTe</span>
            </a>

            <nav class="nav-links">
                <a href="/">Home</a>
                <a href="#nasi-goreng">Nasi Goreng</a>
                <a href="#ayam-goreng">Ayam Goreng</a>
                <a href="/berita">Berita</a>
            </nav>

            <a href="/login" class="btn btn-primary">
                Login <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</header>

<main>
    <section class="hero">
        <div class="container">
            <div class="hero-box reveal">
                <div>
                    <div class="hero-badge">
                        <i class="fa-solid fa-book-open"></i>
                        Katalog Lengkap
                    </div>

                <h1 class="hero-title">
                    Katalog Menu <span>Dapoer Mba ReTe.</span>
                </h1>

                <p class="hero-desc">
                    Pilih menu favorit dari Dapoer Mba ReTe, mulai dari nasi goreng khas rumahan
                    sampai menu ayam gurih yang cocok untuk makan siang, makan malam, atau pesanan online.
                </p>

                <a href="#nasi-goreng" class="btn btn-primary">
                    Mulai Lihat Menu <i class="fa-solid fa-arrow-down"></i>
                </a>

                </div>

                <div class="hero-image">
                    <img src="{{ asset('assets/images/menu.png') }}" alt="Katalog Dapoer Mba ReTe">
                </div>
            </div>
        </div>
    </section>

    <div class="category-nav">
        <div class="container">
            <button type="button" class="category-toggle" id="categoryToggle">
                <span>
                    <i class="fa-solid fa-layer-group"></i>
                    Pilih Kategori
                </span>
                <i class="fa-solid fa-bars"></i>
            </button>

            <div class="category-nav-inner" id="categoryMenu">
                @foreach($sections as $section)
                    <a href="#{{ $section['id'] }}" class="category-link">
                        <i class="{{ $section['icon'] }}"></i>
                        {{ $section['kicker'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    @foreach($sections as $section)
        <section class="section katalog-section" id="{{ $section['id'] }}">
            <div class="container">
                <div class="section-head reveal">
                    <div>
                        <div class="section-kicker">{{ $section['kicker'] }}</div>
                        <h2 class="section-title">{{ $section['title'] }}</h2>
                        <p class="section-desc">{{ $section['desc'] }}</p>
                    </div>

                    <div class="section-count">
                        {{ $section['items']->count() }} Item
                    </div>
                </div>

                @if($section['items']->count())
                    <div class="product-grid">
                        @foreach($section['items'] as $item)

                            @php
                                $nama = $item->nama_produk;
                                $foto = $item->foto;
                                $deskripsi = $item->deskripsi ?: 'Menu pilihan Dapoer Mba ReTe dengan cita rasa rumahan yang cocok untuk makan siang, makan malam, atau pesanan online.';
                                $harga = $formatRupiah($item->harga);
                                $label = $item->size ?: optional($item->kategori)->nama_kategori;
                            @endphp

                            <article class="product-card reveal">
                                <div class="product-img">
                                    <img src="{{ $imageUrl($foto) }}" alt="{{ $nama }}">
                                </div>

                                <h3>{{ $nama }}</h3>
                                <p>{{ $deskripsi }}</p>

                                <div class="product-meta">
                                    <span class="product-price">
                                        {{ $harga ?: 'Tersedia' }}
                                    </span>

                                    <span class="product-label">
                                        {{ $label }}
                                    </span>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="empty-box reveal">
                        Belum ada data untuk bagian ini. Nanti kalau data sudah ditambahkan ke database, tampilannya bakal langsung ikut muncul di katalog.
                    </div>
                @endif
            </div>
        </section>
    @endforeach
</main>

<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-brand">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Dapoer Mba ReTe">
                <span>Dapoer Mba ReTe</span>
            </div>

            <div class="footer-links">
                <a href="/">Home</a>
                <a href="#nasi-goreng">Katalog</a>
                <a href="/berita">Berita</a>
                <a href="/#cabang">Cabang</a>
                <a href="/#kontak">Kontak</a>
            </div>

            <button type="button" class="credit-trigger" id="creditTrigger">
                <i class="fa-solid fa-code"></i>
                Tim Pengembang
            </button>

            <p style="font-size: 14px; color: rgba(255,255,255,0.66);">
                © 2026 Dapoer Mba ReTe
            </p>
        </div>
    </div>
</footer>

<div class="credit-modal" id="creditModal">
    <div class="credit-backdrop" id="creditBackdrop"></div>

    <div class="credit-card">
        <button type="button" class="credit-close" id="creditClose" aria-label="Tutup credit">
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="credit-icon">
            <i class="fa-solid fa-code"></i>
        </div>

        <p class="credit-kicker">Credit Website</p>

        <h3>Dikembangkan oleh Mahasiswa Sistem Informasi, Universitas Mulawarman.</h3>

        <p class="credit-desc">
            Website ini dirancang untuk membantu UMKM tampil lebih profesional,
            mudah dikelola, dan nyaman digunakan pelanggan.
        </p>

        <div class="credit-team">
            <div>
                <strong>Putri</strong>
                <span>Project Lead & Fullstack</span>
            </div>
        </div>

        <div class="credit-cta">
            <p>
                Punya UMKM, organisasi, atau bisnis yang pengen punya website profesional juga?
                Yuk ngobrol, siapa tahu bisa kami bantu wujudkan.
            </p>

            <div class="credit-actions">
                <a href="https://t.me/syzota" target="_blank" rel="noopener noreferrer">
                    <i class="fa-brands fa-telegram"></i>
                    Telegram
                </a>

                <a href="https://github.com/syzota" target="_blank" rel="noopener noreferrer">
                    <i class="fa-brands fa-github"></i>
                    Portofolio
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    const revealElements = document.querySelectorAll('.reveal');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12
    });

    revealElements.forEach((element) => {
        revealObserver.observe(element);
    });

    const categoryLinks = document.querySelectorAll('.category-link');
    const katalogSections = document.querySelectorAll('.katalog-section');

    const activeObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            categoryLinks.forEach((link) => {
                link.classList.remove('is-active');

                if (link.getAttribute('href') === '#' + entry.target.id) {
                    link.classList.add('is-active');
                }
            });
        });
    }, {
        rootMargin: '-45% 0px -45% 0px',
        threshold: 0
    });

    katalogSections.forEach((section) => {
        activeObserver.observe(section);
    });

    const categoryToggle = document.getElementById('categoryToggle');
    const categoryMenu = document.getElementById('categoryMenu');

    function closeCategoryMenu() {
        if (!categoryToggle || !categoryMenu) {
            return;
        }

        categoryMenu.classList.remove('is-open');

        const icon = categoryToggle.querySelector('i:last-child');
        if (icon) {
            icon.classList.add('fa-bars');
            icon.classList.remove('fa-xmark');
        }
    }

    if (categoryToggle && categoryMenu) {
        categoryToggle.addEventListener('click', function () {
            categoryMenu.classList.toggle('is-open');

            const icon = categoryToggle.querySelector('i:last-child');
            if (icon) {
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-xmark');
            }
        });

        categoryMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                closeCategoryMenu();
            });
        });
    }

    const creditTrigger = document.getElementById('creditTrigger');
    const creditModal = document.getElementById('creditModal');
    const creditBackdrop = document.getElementById('creditBackdrop');
    const creditClose = document.getElementById('creditClose');

    function openCreditModal() {
        if (!creditModal) {
            return;
        }

        creditModal.classList.add('is-open');
        document.body.classList.add('modal-open');
        closeCategoryMenu();
    }

    function closeCreditModal() {
        if (!creditModal) {
            return;
        }

        creditModal.classList.remove('is-open');
        document.body.classList.remove('modal-open');
    }

    if (creditTrigger) {
        creditTrigger.addEventListener('click', function () {
            openCreditModal();
        });
    }

    if (creditBackdrop) {
        creditBackdrop.addEventListener('click', function () {
            closeCreditModal();
        });
    }

    if (creditClose) {
        creditClose.addEventListener('click', function () {
            closeCreditModal();
        });
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeCreditModal();
            closeCategoryMenu();
        }
    });

    window.addEventListener('scroll', function () {
        if (
            window.innerWidth <= 720 &&
            categoryMenu &&
            categoryMenu.classList.contains('is-open')
        ) {
            closeCategoryMenu();
        }
    });

    window.addEventListener('resize', function () {
        if (window.innerWidth > 720) {
            closeCategoryMenu();
        }
    });
</script>

</body>
</html>