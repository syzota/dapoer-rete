<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - Dapoer Mba ReTe</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --red-dark: #5B1518;
            --red-main: #8F1018;
            --orange: #F05A00;
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
            filter: drop-shadow(0 6px 10px rgba(80, 20, 20, 0.10));
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

        .btn-soft {
            background: var(--yellow-soft);
            color: var(--red-dark);
        }

        .btn-primary:hover,
        .btn-soft:hover {
            transform: translateY(-2px);
        }

        .hero {
            padding: 74px 0 34px;
        }

        .hero-box {
            border-radius: 34px;
            padding: 34px;
            background: linear-gradient(135deg, rgba(255,255,255,0.84), rgba(248,246,213,0.78));
            box-shadow: var(--shadow-soft);
            display: grid;
            grid-template-columns: minmax(0, 1.1fr) 260px;
            gap: 28px;
            align-items: center;
            overflow: hidden;
            position: relative;
        }

        .hero-box::after {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            right: -70px;
            bottom: -90px;
            border-radius: 50%;
            background: rgba(240, 90, 0, 0.10);
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
            margin-bottom: 16px;
        }

        .hero-title {
            max-width: 720px;
            font-size: clamp(38px, 5vw, 62px);
            line-height: 1.02;
            letter-spacing: -1.6px;
            color: var(--red-dark);
            margin-bottom: 14px;
        }

        .hero-title span {
            color: var(--orange);
        }

        .hero-desc {
            max-width: 650px;
            font-size: 16px;
            line-height: 1.75;
            color: rgba(68, 22, 25, 0.72);
            margin-bottom: 0;
        }

        .hero-visual {
            position: relative;
            z-index: 1;
            width: 220px;
            height: 220px;
            border-radius: 34px;
            background: linear-gradient(135deg, rgba(166, 13, 25, 0.95), rgba(240, 90, 0, 0.9));
            display: grid;
            place-items: center;
            color: white;
            box-shadow: 0 24px 60px rgba(81, 42, 18, 0.18);
            justify-self: end;
        }

        .hero-visual i {
            font-size: 72px;
            filter: drop-shadow(0 14px 24px rgba(0,0,0,0.20));
        }

        .section {
            padding: 42px 0 86px;
        }

        .section-head {
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
            font-size: clamp(32px, 4vw, 48px);
            line-height: 1.12;
            letter-spacing: -0.8px;
            margin-bottom: 10px;
        }

        .section-desc {
            max-width: 720px;
            font-size: 15px;
            line-height: 1.7;
            color: rgba(68, 22, 25, 0.70);
        }

        .news-grid {
            width: min(1040px, 100%);
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .news-card {
            border-radius: 28px;
            background: rgba(255, 255, 255, 0.86);
            box-shadow: var(--shadow-card);
            overflow: hidden;
            transition: 0.24s ease;
            border: 1px solid rgba(255, 255, 255, 0.72);
            display: flex;
            flex-direction: column;
            min-height: 100%;
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 26px 55px rgba(81, 42, 18, 0.16);
        }

        .news-img {
            height: 230px;
            background: var(--cream);
            overflow: hidden;
            display: block;
            flex-shrink: 0;
        }

        .news-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .news-content {
            padding: 22px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .news-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 14px;
            color: rgba(68, 22, 25, 0.62);
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .news-meta span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .news-meta i {
            color: var(--orange);
        }

        .news-card h3 {
            color: var(--red-dark);
            font-size: 25px;
            line-height: 1.18;
            letter-spacing: -0.4px;
            margin-bottom: 10px;
        }

        .news-card p {
            color: rgba(68, 22, 25, 0.68);
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 18px;
        }

        .read-link {
            margin-top: auto;
            color: var(--orange);
            font-size: 14px;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            width: fit-content;
        }

        .empty-box {
            border-radius: 28px;
            padding: 34px;
            background: rgba(255, 255, 255, 0.82);
            box-shadow: var(--shadow-card);
            text-align: center;
            color: rgba(68, 22, 25, 0.68);
            line-height: 1.7;
        }

        .footer {
            background: var(--red-dark);
            color: white;
            padding: 32px 0;
        }

        .footer-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
        }

        .footer-brand img {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        .footer-links {
            display: flex;
            gap: 18px;
            color: rgba(255,255,255,0.72);
            font-size: 14px;
            font-weight: 700;
        }

        @media (max-width: 980px) {
            .hero-box {
                grid-template-columns: 1fr;
            }

            .hero-visual {
                width: 100%;
                height: 190px;
                justify-self: stretch;
            }

            .news-grid {
                grid-template-columns: 1fr;
                width: min(720px, 100%);
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
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
                border-radius: 26px;
                padding: 10px 12px 10px 14px;
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

            .nav-links {
                display: none;
            }

            .nav-card .btn {
                display: none;
            }

            .hero {
                padding: 46px 0 24px;
            }

            .hero-box {
                padding: 24px;
                border-radius: 28px;
                gap: 22px;
            }

            .hero-title {
                font-size: 38px;
                letter-spacing: -1px;
            }

            .hero-desc {
                font-size: 15px;
            }

            .hero-visual {
                height: 150px;
                border-radius: 24px;
            }

            .hero-visual i {
                font-size: 54px;
            }

            .section {
                padding: 32px 0 70px;
            }

            .section-title {
                font-size: 32px;
            }

            .section-desc {
                font-size: 15px;
            }

            .news-img {
                height: 210px;
            }

            .news-content {
                padding: 20px;
            }

            .news-card h3 {
                font-size: 23px;
            }

            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container">
            <div class="nav-card">
                <a href="/" class="brand">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Dapoer Mba ReTe">
                    <span>Dapoer Mba ReTe</span>
                </a>

                <nav class="nav-links">
                    <a href="/">Home</a>
                    <a href="/katalog">Katalog</a>
                    <a href="/berita">Berita</a>
                    <a href="/#kontak">Kontak</a>
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
                <div class="hero-box">
                    <div>
                        <div class="hero-badge">
                            <i class="fa-solid fa-newspaper"></i>
                            Kabar Dapoer
                        </div>

                        <h1 class="hero-title">
                            Berita terbaru <span>Dapoer Mba ReTe.</span>
                        </h1>

                        <p class="hero-desc">
                            Temukan informasi terbaru seputar Dapoer Mba ReTe, mulai dari menu baru,
                            promo, update layanan, hingga kabar pemesanan online.
                        </p>
                    </div>

                    <div class="hero-visual">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-head">
                    <div class="section-kicker">Informasi Terbaru</div>
                    <h2 class="section-title">Update dan info terbaru</h2>
                    <p class="section-desc">
                        Kumpulan informasi terbaru dari dapur kami, mulai dari menu baru,
                        promo, layanan pemesanan, sampai kabar cabang.
                    </p>
                </div>

                @if($berita->count())
                    <div class="news-grid">
                        @foreach($berita as $item)
                            <article class="news-card">
                                <a href="{{ route('berita.show', $item->slug) }}" class="news-img">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                                    @else
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="{{ $item->judul }}">
                                    @endif
                                </a>

                                <div class="news-content">
                                    <div class="news-meta">
                                        <span>
                                            <i class="fa-solid fa-user"></i>
                                            {{ $item->author }}
                                        </span>

                                        <span>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            {{ \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d M Y') }}
                                        </span>
                                    </div>

                                    <h3>
                                        <a href="{{ route('berita.show', $item->slug) }}">
                                            {{ $item->judul }}
                                        </a>
                                    </h3>

                                    <p>
                                        {{ Str::limit(strip_tags($item->isi), 145) }}
                                    </p>

                                    <a href="{{ route('berita.show', $item->slug) }}" class="read-link">
                                        Baca Selengkapnya
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                @else
                    <div class="empty-box">
                        Belum ada berita yang dipublikasikan. Silakan tambahkan berita melalui halaman admin.
                    </div>
                @endif
            </div>
        </section>
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
                    <a href="/katalog">Katalog</a>
                    <a href="/berita">Berita</a>
                    <a href="/#kontak">Kontak</a>
                </div>

                <p style="font-size: 14px; color: rgba(255,255,255,0.66);">
                    © 2026 Dapoer Mba ReTe
                </p>
            </div>
        </div>
    </footer>
</body>
</html>