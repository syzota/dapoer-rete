<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita - Dapoer Mba ReTe</title>

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

        button,
        input,
        textarea,
        select {
            font-family: inherit;
        }

        .admin-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 24px;
            width: min(1280px, calc(100% - 36px));
            margin: 0 auto;
            padding: 24px 0;
            min-height: 100vh;
        }

        .sidebar {
            position: sticky;
            top: 24px;
            height: calc(100vh - 48px);
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--shadow-soft);
            backdrop-filter: blur(14px);
            padding: 22px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            color: var(--red-dark);
            font-weight: 800;
        }

        .brand img {
            width: 48px;
            height: 48px;
            object-fit: contain;
            filter: drop-shadow(0 8px 12px rgba(80, 20, 20, 0.10));
        }

        .brand span {
            line-height: 1.15;
        }

        .side-label {
            margin: 10px 0 8px;
            color: rgba(68, 22, 25, 0.48);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .side-nav {
            display: grid;
            gap: 8px;
        }

        .side-link {
            min-height: 46px;
            border-radius: 16px;
            padding: 0 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: rgba(68, 22, 25, 0.72);
            font-size: 14px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .side-link i {
            width: 18px;
            color: var(--orange);
        }

        .side-link:hover,
        .side-link.active {
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: white;
            box-shadow: 0 14px 26px rgba(171, 45, 0, 0.20);
        }

        .side-link:hover i,
        .side-link.active i {
            color: white;
        }

        .side-footer {
            margin-top: auto;
            display: grid;
            gap: 8px;
        }

        .main {
            min-width: 0;
        }

        .mobile-topbar {
            display: none;
            position: sticky;
            top: 12px;
            z-index: 90;
            margin-bottom: 16px;
        }

        .mobile-card {
            min-height: 68px;
            border-radius: 24px;
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 14px 32px rgba(81, 42, 18, 0.12);
            backdrop-filter: blur(14px);
            padding: 10px 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .mobile-brand {
            display: flex;
            align-items: center;
            gap: 9px;
            color: var(--red-dark);
            font-weight: 800;
            font-size: 14px;
            line-height: 1.1;
        }

        .mobile-brand img {
            width: 42px;
            height: 42px;
            object-fit: contain;
        }

        .menu-toggle {
            width: 44px;
            height: 44px;
            border: none;
            border-radius: 50%;
            background: var(--yellow-soft);
            color: var(--red-dark);
            font-size: 18px;
            cursor: pointer;
        }

        .mobile-menu {
            display: none;
            margin-top: 10px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: 0 14px 32px rgba(81, 42, 18, 0.12);
            backdrop-filter: blur(14px);
            padding: 10px;
        }

        .mobile-menu.is-open {
            display: grid;
            gap: 6px;
            animation: dropdown 0.22s ease;
        }

        .page-head {
            border-radius: 30px;
            padding: 28px;
            background: linear-gradient(135deg, rgba(255,255,255,0.86), rgba(248,246,213,0.78));
            box-shadow: var(--shadow-soft);
            margin-bottom: 22px;
            display: flex;
            justify-content: space-between;
            gap: 18px;
            align-items: center;
        }

        .page-title h1 {
            color: var(--red-dark);
            font-size: clamp(28px, 4vw, 42px);
            line-height: 1.05;
            letter-spacing: -0.8px;
            margin-bottom: 8px;
        }

        .page-title p {
            color: rgba(68, 22, 25, 0.68);
            line-height: 1.6;
        }

        .btn {
            min-height: 44px;
            border: none;
            border-radius: 999px;
            padding: 0 18px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.22s ease;
            white-space: nowrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: white;
            box-shadow: 0 14px 30px rgba(171, 45, 0, 0.22);
        }

        .btn-soft {
            background: var(--yellow-soft);
            color: var(--red-dark);
        }

        .btn-primary:hover,
        .btn-soft:hover {
            transform: translateY(-2px);
        }

        .content-card {
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--shadow-card);
            padding: 26px;
            backdrop-filter: blur(10px);
        }

        .form-grid {
            display: grid;
            gap: 18px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--red-dark);
            font-size: 14px;
            font-weight: 800;
        }

        .form-control {
            width: 100%;
            min-height: 48px;
            border-radius: 16px;
            border: 1px solid rgba(91, 21, 24, 0.14);
            background: rgba(255, 255, 255, 0.92);
            padding: 12px 14px;
            font-size: 14px;
            color: var(--text-dark);
            outline: none;
            font-weight: 600;
        }

        textarea.form-control {
            min-height: 240px;
            resize: vertical;
            line-height: 1.7;
        }

        .form-control:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 4px rgba(240, 90, 0, 0.10);
        }

        .hint {
            margin-top: 7px;
            color: rgba(68, 22, 25, 0.58);
            font-size: 13px;
            line-height: 1.5;
        }

        .error {
            margin-top: 7px;
            color: #A60D19;
            font-size: 13px;
            font-weight: 800;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        @keyframes dropdown {
            from {
                opacity: 0;
                transform: translateY(-8px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @media (max-width: 980px) {
            .admin-layout {
                display: block;
                width: min(100% - 28px, 1280px);
                padding: 12px 0 24px;
            }

            .sidebar {
                display: none;
            }

            .mobile-topbar {
                display: block;
            }

            .page-head {
                flex-direction: column;
                align-items: stretch;
                padding: 24px;
                border-radius: 26px;
            }

            .page-head .btn {
                width: 100%;
            }

            .content-card {
                padding: 20px;
                border-radius: 26px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                display: grid;
                grid-template-columns: 1fr;
            }

            .form-actions .btn {
                width: 100%;
            }
        }

        @media (max-width: 420px) {
            .admin-layout {
                width: min(100% - 22px, 1280px);
            }

            .page-title h1 {
                font-size: 30px;
            }

            .page-title p {
                font-size: 14px;
            }

            .content-card {
                padding: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <a href="/" class="brand">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Dapoer Mba ReTe">
                <span>Dapoer<br>Mba ReTe</span>
            </a>

            <div class="side-label">Admin Panel</div>

            <nav class="side-nav">
                <a href="{{ route('owner.berita.index') }}" class="side-link active">
                    <i class="fa-solid fa-newspaper"></i>
                    Kelola Berita
                </a>

                <a href="/owner/produk" class="side-link">
                    <i class="fa-solid fa-utensils"></i>
                    Kelola Katalog
                </a>

                <a href="/" class="side-link">
                    <i class="fa-solid fa-house"></i>
                    Lihat Website
                </a>
            </nav>

            <div class="side-footer">
                <a href="/katalog" class="side-link">
                    <i class="fa-solid fa-book-open"></i>
                    Preview Katalog
                </a>

                <a href="/logout" class="side-link">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </a>
            </div>
        </aside>

        <main class="main">
            <div class="mobile-topbar">
                <div class="mobile-card">
                    <a href="/" class="mobile-brand">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Dapoer Mba ReTe">
                        <span>Dapoer<br>Mba ReTe</span>
                    </a>

                    <button type="button" class="menu-toggle" id="menuToggle" aria-label="Buka menu">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>

                <div class="mobile-menu" id="mobileMenu">
                    <a href="{{ route('owner.berita.index') }}" class="side-link active">
                        <i class="fa-solid fa-newspaper"></i>
                        Kelola Berita
                    </a>

                    <a href="/owner/produk" class="side-link">
                        <i class="fa-solid fa-utensils"></i>
                        Kelola Katalog
                    </a>

                    <a href="/" class="side-link">
                        <i class="fa-solid fa-house"></i>
                        Lihat Website
                    </a>

                    <a href="/logout" class="side-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout
                    </a>
                </div>
            </div>

            <section class="page-head">
                <div class="page-title">
                    <h1>Tambah Berita</h1>
                    <p>Buat berita atau informasi terbaru tentang Dapoer Mba ReTe.</p>
                </div>

                <a href="{{ route('owner.berita.index') }}" class="btn btn-soft">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </a>
            </section>

            <section class="content-card">
                <form action="{{ route('owner.berita.store') }}" method="POST" enctype="multipart/form-data" class="form-grid">
                    @csrf

                    <div class="form-group">
                        <label for="judul">Judul Berita</label>
                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            class="form-control"
                            value="{{ old('judul') }}"
                            placeholder="Contoh: Menu Baru Nasi Goreng Tom Yam Kini Hadir"
                            required
                        >

                        @error('judul')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="author">Author Penulis</label>
                            <input
                                type="text"
                                id="author"
                                name="author"
                                class="form-control"
                                value="{{ old('author', session('name') ?? 'Admin') }}"
                                placeholder="Nama penulis"
                                required
                            >

                            @error('author')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_terbit">Tanggal Terbit</label>
                            <input
                                type="date"
                                id="tanggal_terbit"
                                name="tanggal_terbit"
                                class="form-control"
                                value="{{ old('tanggal_terbit', date('Y-m-d')) }}"
                                required
                            >

                            @error('tanggal_terbit')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="status">Status Berita</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                                <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>

                            @error('status')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Berita</label>
                            <input
                                type="file"
                                id="gambar"
                                name="gambar"
                                class="form-control"
                                accept="image/png,image/jpeg,image/jpg,image/webp"
                            >

                            <div class="hint">
                                Format: JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                            </div>

                            @error('gambar')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="isi">Isi Berita / Informasi</label>
                        <textarea
                            id="isi"
                            name="isi"
                            class="form-control"
                            placeholder="Tulis isi berita di sini..."
                            required
                        >{{ old('isi') }}</textarea>

                        @error('isi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('owner.berita.index') }}" class="btn btn-soft">
                            Batal
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save"></i>
                            Simpan Berita
                        </button>
                    </div>
                </form>
            </section>
        </main>
    </div>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function () {
                mobileMenu.classList.toggle('is-open');

                const icon = menuToggle.querySelector('i');
                if (icon) {
                    icon.classList.toggle('fa-bars');
                    icon.classList.toggle('fa-xmark');
                }
            });
        }
    </script>
</body>
</html>