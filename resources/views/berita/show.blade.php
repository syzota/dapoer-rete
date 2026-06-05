<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - Dapoer Mba ReTe</title>

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
            width: min(1060px, calc(100% - 40px));
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

        .article {
            padding: 72px 0 82px;
        }

        .article-card {
            border-radius: 38px;
            background: rgba(255,255,255,0.86);
            box-shadow: var(--shadow-soft);
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.72);
        }

        .article-img {
            width: 100%;
            height: 420px;
            background: var(--cream);
            overflow: hidden;
        }

        .article-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .article-body {
            padding: 38px;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            align-items: center;
            color: rgba(68, 22, 25, 0.62);
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .article-meta span {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(242, 240, 168, 0.65);
        }

        .article-meta i {
            color: var(--orange);
        }

        .article-title {
            color: var(--red-dark);
            font-size: clamp(34px, 5vw, 58px);
            line-height: 1.05;
            letter-spacing: -1.5px;
            margin-bottom: 22px;
        }

        .article-content {
            color: rgba(68, 22, 25, 0.76);
            font-size: 17px;
            line-height: 1.85;
            white-space: pre-line;
        }

        .related {
            margin-top: 34px;
            border-radius: 32px;
            background: rgba(255,255,255,0.82);
            box-shadow: var(--shadow-card);
            padding: 28px;
        }

        .related h2 {
            color: var(--red-dark);
            font-size: 28px;
            margin-bottom: 18px;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .related-card {
            border-radius: 22px;
            background: rgba(248,246,213,0.58);
            padding: 16px;
            transition: 0.2s ease;
        }

        .related-card:hover {
            transform: translateY(-4px);
            background: rgba(242, 240, 168, 0.78);
        }

        .related-card h3 {
            color: var(--red-dark);
            font-size: 17px;
            line-height: 1.35;
            margin-bottom: 8px;
        }

        .related-card p {
            color: rgba(68, 22, 25, 0.62);
            font-size: 13px;
            font-weight: 700;
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
            .related-grid {
                grid-template-columns: 1fr;
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 720px) {
            .container {
                width: min(100% - 28px, 1060px);
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

            .article {
                padding: 46px 0 62px;
            }

            .article-card {
                border-radius: 28px;
            }

            .article-img {
                height: 260px;
            }

            .article-body {
                padding: 24px;
            }

            .article-title {
                font-size: 34px;
                letter-spacing: -0.8px;
            }

            .article-content {
                font-size: 15px;
                line-height: 1.75;
            }

            .footer-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }

        @media (max-width: 420px) {
            .article-img {
                height: 210px;
            }

            .article-title {
                font-size: 30px;
            }

            .article-body {
                padding: 20px;
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

    <main class="article">
        <div class="container">
            <a href="/berita" class="btn btn-soft" style="margin-bottom: 18px;">
                <i class="fa-solid fa-arrow-left"></i>
                Kembali ke Berita
            </a>

            <article class="article-card">
                <div class="article-img">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                    @else
                        <img src="{{ asset('assets/images/logo.png') }}" alt="{{ $berita->judul }}">
                    @endif
                </div>

                <div class="article-body">
                    <div class="article-meta">
                        <span>
                            <i class="fa-solid fa-user"></i>
                            {{ $berita->author }}
                        </span>

                        <span>
                            <i class="fa-solid fa-calendar-days"></i>
                            {{ \Carbon\Carbon::parse($berita->tanggal_terbit)->translatedFormat('d F Y') }}
                        </span>
                    </div>

                    <h1 class="article-title">{{ $berita->judul }}</h1>

                    <div class="article-content">
                        {{ $berita->isi }}
                    </div>
                </div>
            </article>

            @if($beritaLainnya->count())
                <section class="related">
                    <h2>Berita Lainnya</h2>

                    <div class="related-grid">
                        @foreach($beritaLainnya as $item)
                            <a href="{{ route('berita.show', $item->slug) }}" class="related-card">
                                <h3>{{ $item->judul }}</h3>
                                <p>
                                    {{ $item->author }} • {{ \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d M Y') }}
                                </p>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
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