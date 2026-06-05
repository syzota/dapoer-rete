<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Katalog - Dapoer Mba ReTe</title>

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

        .btn-danger {
            background: var(--red-dark);
            color: white;
        }

        .btn-primary:hover,
        .btn-soft:hover,
        .btn-danger:hover {
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 20px;
            padding: 14px 16px;
            background: rgba(109, 158, 54, 0.14);
            color: #42651f;
            font-weight: 800;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .workspace {
            display: grid;
            grid-template-columns: minmax(0, 1.45fr) minmax(330px, 0.75fr);
            gap: 22px;
            align-items: start;
        }

        .content-card {
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--shadow-card);
            padding: 22px;
            backdrop-filter: blur(10px);
        }

        .card-title {
            color: var(--red-dark);
            font-size: 21px;
            font-weight: 800;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .table-wrap {
            overflow-x: auto;
            border-radius: 22px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 780px;
            overflow: hidden;
        }

        th {
            text-align: left;
            padding: 14px;
            color: var(--red-dark);
            font-size: 13px;
            background: rgba(242, 240, 168, 0.72);
            white-space: nowrap;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid rgba(91, 21, 24, 0.08);
            vertical-align: top;
            font-size: 14px;
        }

        .product-title {
            color: var(--red-dark);
            font-weight: 800;
            margin-bottom: 5px;
            line-height: 1.35;
        }

        .product-desc {
            color: rgba(68, 22, 25, 0.62);
            line-height: 1.5;
            max-width: 290px;
        }

        .product-price {
            font-weight: 800;
            color: var(--orange);
            white-space: nowrap;
        }

        .badge {
            display: inline-flex;
            padding: 7px 11px;
            border-radius: 999px;
            background: rgba(242, 240, 168, 0.9);
            color: var(--red-dark);
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .empty {
            text-align: center;
            padding: 36px;
            color: rgba(68, 22, 25, 0.62);
            font-weight: 800;
            line-height: 1.6;
        }

        .form-card {
            position: sticky;
            top: 24px;
        }

        .form-grid {
            display: grid;
            gap: 16px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
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
            min-height: 116px;
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

        .form-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 4px;
        }

        .form-actions .btn-primary {
            flex: 1;
        }

        .mobile-product-list {
            display: none;
        }

        .product-card {
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(91, 21, 24, 0.08);
            padding: 14px;
            display: grid;
            gap: 12px;
        }

        .product-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            align-items: center;
        }

        .modal {
            position: fixed;
            inset: 0;
            z-index: 999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 22px;
        }

        .modal.is-open {
            display: flex;
        }

        .modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(36, 10, 12, 0.58);
            backdrop-filter: blur(8px);
        }

        .modal-card {
            position: relative;
            z-index: 1;
            width: min(460px, 100%);
            border-radius: 28px;
            padding: 26px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(248, 246, 213, 0.94));
            box-shadow: 0 30px 90px rgba(36, 10, 12, 0.30);
            animation: modalPop 0.24s ease;
        }

        .modal-icon {
            width: 58px;
            height: 58px;
            border-radius: 20px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #A60D19 0%, #F05A00 100%);
            color: white;
            font-size: 22px;
            margin-bottom: 16px;
        }

        .modal-card h3 {
            color: var(--red-dark);
            font-size: 26px;
            margin-bottom: 8px;
        }

        .modal-card p {
            color: rgba(68, 22, 25, 0.68);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .modal-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            flex-wrap: wrap;
        }

        body.modal-open {
            overflow: hidden;
        }

        @keyframes modalPop {
            from {
                opacity: 0;
                transform: translateY(12px) scale(0.97);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
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

        @media (max-width: 1080px) {
            .workspace {
                grid-template-columns: 1fr;
            }

            .form-card {
                position: static;
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
                padding: 18px;
                border-radius: 26px;
            }
        }

        @media (max-width: 720px) {
            .table-wrap {
                display: none;
            }

            .mobile-product-list {
                display: grid;
                gap: 12px;
            }

            .page-title h1 {
                font-size: 31px;
            }

            .page-title p {
                font-size: 14px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .actions,
            .form-actions,
            .modal-actions {
                display: grid;
                grid-template-columns: 1fr;
            }

            .actions .btn,
            .product-card form,
            .product-card form .btn,
            .form-actions .btn,
            .modal-actions .btn {
                width: 100%;
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
                <a href="{{ route('owner.berita.index') }}" class="side-link">
                    <i class="fa-solid fa-newspaper"></i>
                    Kelola Berita
                </a>

                <a href="{{ route('owner.produk') }}" class="side-link active">
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
                    <a href="{{ route('owner.berita.index') }}" class="side-link">
                        <i class="fa-solid fa-newspaper"></i>
                        Kelola Berita
                    </a>

                    <a href="{{ route('owner.produk') }}" class="side-link active">
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
                    <h1>Kelola Katalog</h1>
                    <p>Tambah, edit, dan hapus menu ayam serta nasi goreng yang tampil di halaman katalog.</p>
                </div>

                <a href="/katalog" class="btn btn-primary">
                    <i class="fa-solid fa-eye"></i>
                    Preview Katalog
                </a>
            </section>

            @if(session('success'))
                <div class="alert">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="workspace">
                <section class="content-card">
                    <div class="card-title">
                        <i class="fa-solid fa-list"></i>
                        Daftar Produk
                    </div>

                    @if($produk->isEmpty())
                        <div class="empty">
                            Belum ada data produk. Silakan tambah menu baru melalui form di samping.
                        </div>
                    @else
                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Ukuran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($produk as $p)
                                        <tr
                                            class="produk-row"
                                            data-id="{{ $p->id }}"
                                            data-nama="{{ $p->nama_produk }}"
                                            data-harga="{{ $p->harga }}"
                                            data-size="{{ $p->size }}"
                                            data-kategori-id="{{ $p->id_kategori }}"
                                            data-deskripsi="{{ $p->deskripsi }}"
                                        >
                                            <td>
                                                <div class="product-title">{{ $p->nama_produk }}</div>

                                                @if($p->deskripsi)
                                                    <div class="product-desc">
                                                        {{ Str::limit($p->deskripsi, 86) }}
                                                    </div>
                                                @else
                                                    <div class="product-desc">
                                                        Belum ada deskripsi menu.
                                                    </div>
                                                @endif
                                            </td>

                                            <td>
                                                <span class="badge">
                                                    {{ $p->kategori ? $p->kategori->nama_kategori : '-' }}
                                                </span>
                                            </td>

                                            <td class="product-price">
                                                Rp {{ number_format($p->harga, 0, ',', '.') }}
                                            </td>

                                            <td>
                                                <span class="badge">
                                                    {{ $p->size ?: '-' }}
                                                </span>
                                            </td>

                                            <td>
                                                <div class="actions">
                                                    <button type="button" class="btn btn-soft btn-edit">
                                                        <i class="fa-solid fa-pen"></i>
                                                        Edit
                                                    </button>

                                                    <form id="delete-form-{{ $p->id }}" action="{{ route('owner.produk.delete', $p->id) }}" method="POST">
                                                        @csrf

                                                        <button
                                                            type="button"
                                                            class="btn btn-danger delete-trigger"
                                                            data-form="delete-form-{{ $p->id }}"
                                                            data-title="{{ $p->nama_produk }}"
                                                        >
                                                            <i class="fa-solid fa-trash"></i>
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mobile-product-list">
                            @foreach($produk as $p)
                                <article
                                    class="product-card produk-row"
                                    data-id="{{ $p->id }}"
                                    data-nama="{{ $p->nama_produk }}"
                                    data-harga="{{ $p->harga }}"
                                    data-size="{{ $p->size }}"
                                    data-kategori-id="{{ $p->id_kategori }}"
                                    data-deskripsi="{{ $p->deskripsi }}"
                                >
                                    <div>
                                        <div class="product-title">{{ $p->nama_produk }}</div>

                                        <div class="product-desc">
                                            {{ $p->deskripsi ? Str::limit($p->deskripsi, 110) : 'Belum ada deskripsi menu.' }}
                                        </div>
                                    </div>

                                    <div class="product-meta">
                                        <span class="badge">
                                            {{ $p->kategori ? $p->kategori->nama_kategori : '-' }}
                                        </span>

                                        <span class="badge">
                                            {{ $p->size ?: 'Tanpa ukuran' }}
                                        </span>

                                        <span class="product-price">
                                            Rp {{ number_format($p->harga, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <div class="actions">
                                        <button type="button" class="btn btn-soft btn-edit">
                                            <i class="fa-solid fa-pen"></i>
                                            Edit
                                        </button>

                                        <form id="delete-mobile-form-{{ $p->id }}" action="{{ route('owner.produk.delete', $p->id) }}" method="POST">
                                            @csrf

                                            <button
                                                type="button"
                                                class="btn btn-danger delete-trigger"
                                                data-form="delete-mobile-form-{{ $p->id }}"
                                                data-title="{{ $p->nama_produk }}"
                                            >
                                                <i class="fa-solid fa-trash"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    @endif
                </section>

                <section class="content-card form-card" id="form-card">
                    <div class="card-title" id="form-title">
                        <i class="fa-solid fa-plus"></i>
                        Tambah Produk
                    </div>

                    <form action="{{ route('owner.produk.store') }}" method="POST" id="produk-form" class="form-grid">
                        @csrf

                        <div class="form-group">
                            <label for="input-nama">Nama Produk</label>
                            <input
                                type="text"
                                name="nama_produk"
                                id="input-nama"
                                class="form-control"
                                placeholder="Contoh: Nasi Goreng Tom Yam"
                                required
                                autocomplete="off"
                            >
                        </div>

                        <div class="form-group">
                            <label for="input-kategori">Kategori Produk</label>
                            <select name="id_kategori" id="input-kategori" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>

                                @foreach($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="input-harga">Harga</label>
                                <input
                                    type="number"
                                    name="harga"
                                    id="input-harga"
                                    class="form-control"
                                    placeholder="Contoh: 25000"
                                    min="0"
                                    required
                                    autocomplete="off"
                                >
                            </div>

                            <div class="form-group">
                                <label for="input-size">Ukuran / Porsi</label>
                                <input
                                    type="text"
                                    name="size"
                                    id="input-size"
                                    class="form-control"
                                    placeholder="Contoh: Reguler"
                                    autocomplete="off"
                                >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="input-deskripsi">Deskripsi Menu</label>
                            <textarea
                                name="deskripsi"
                                id="input-deskripsi"
                                class="form-control"
                                rows="4"
                                placeholder="Tulis deskripsi singkat menu..."
                            ></textarea>

                            <div class="hint">
                                Deskripsi ini akan tampil di halaman katalog sebagai informasi menu.
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary" id="btn-submit">
                                <i class="fa-solid fa-save"></i>
                                Simpan Produk
                            </button>

                            <button type="button" class="btn btn-soft" id="btn-cancel" style="display: none;">
                                Batal
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </main>
    </div>

    <div class="modal" id="deleteModal">
        <div class="modal-backdrop" id="modalBackdrop"></div>

        <div class="modal-card">
            <div class="modal-icon">
                <i class="fa-solid fa-trash"></i>
            </div>

            <h3>Hapus produk?</h3>
            <p>
                Produk <strong id="deleteTitle">ini</strong> akan dihapus dari katalog.
                Aksi ini tidak bisa dibatalkan.
            </p>

            <div class="modal-actions">
                <button type="button" class="btn btn-soft" id="cancelDelete">
                    Batal
                </button>

                <button type="button" class="btn btn-danger" id="confirmDelete">
                    Ya, Hapus
                </button>
            </div>
        </div>
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

        const formCard = document.getElementById('form-card');
        const formTitle = document.getElementById('form-title');
        const produkForm = document.getElementById('produk-form');
        const inputNama = document.getElementById('input-nama');
        const inputKategori = document.getElementById('input-kategori');
        const inputHarga = document.getElementById('input-harga');
        const inputSize = document.getElementById('input-size');
        const inputDeskripsi = document.getElementById('input-deskripsi');
        const btnSubmit = document.getElementById('btn-submit');
        const btnCancel = document.getElementById('btn-cancel');

        function resetForm() {
            formTitle.innerHTML = '<i class="fa-solid fa-plus"></i> Tambah Produk';
            produkForm.action = "{{ route('owner.produk.store') }}";

            inputNama.value = '';
            inputKategori.value = '';
            inputHarga.value = '';
            inputSize.value = '';
            inputDeskripsi.value = '';

            btnSubmit.innerHTML = '<i class="fa-solid fa-save"></i> Simpan Produk';
            btnCancel.style.display = 'none';
            formCard.style.borderColor = 'rgba(255, 255, 255, 0.86)';
        }

        document.querySelectorAll('.btn-edit').forEach((button) => {
            button.addEventListener('click', function () {
                const row = this.closest('.produk-row');

                const id = row.dataset.id;
                const nama = row.dataset.nama || '';
                const harga = row.dataset.harga || '';
                const size = row.dataset.size || '';
                const kategoriId = row.dataset.kategoriId || '';
                const deskripsi = row.dataset.deskripsi || '';

                formTitle.innerHTML = '<i class="fa-solid fa-pen"></i> Edit Produk';
                produkForm.action = `/owner/produk/update/${id}`;

                inputNama.value = nama;
                inputKategori.value = kategoriId;
                inputHarga.value = harga;
                inputSize.value = size === '-' ? '' : size;
                inputDeskripsi.value = deskripsi;

                btnSubmit.innerHTML = '<i class="fa-solid fa-save"></i> Update Produk';
                btnCancel.style.display = 'inline-flex';
                formCard.style.borderColor = 'var(--orange)';

                if (window.innerWidth <= 1080) {
                    formCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }

                inputNama.focus();
            });
        });

        btnCancel.addEventListener('click', resetForm);

        const deleteModal = document.getElementById('deleteModal');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const cancelDelete = document.getElementById('cancelDelete');
        const confirmDelete = document.getElementById('confirmDelete');
        const deleteTitle = document.getElementById('deleteTitle');
        const deleteButtons = document.querySelectorAll('.delete-trigger');

        let selectedDeleteForm = null;

        function openDeleteModal(formId, title) {
            selectedDeleteForm = document.getElementById(formId);

            if (deleteTitle) {
                deleteTitle.textContent = title || 'ini';
            }

            deleteModal.classList.add('is-open');
            document.body.classList.add('modal-open');
        }

        function closeDeleteModal() {
            selectedDeleteForm = null;
            deleteModal.classList.remove('is-open');
            document.body.classList.remove('modal-open');
        }

        deleteButtons.forEach((button) => {
            button.addEventListener('click', function () {
                openDeleteModal(this.dataset.form, this.dataset.title);
            });
        });

        confirmDelete.addEventListener('click', function () {
            if (selectedDeleteForm) {
                selectedDeleteForm.submit();
            }
        });

        cancelDelete.addEventListener('click', closeDeleteModal);
        modalBackdrop.addEventListener('click', closeDeleteModal);

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && deleteModal.classList.contains('is-open')) {
                closeDeleteModal();
            }
        });
    </script>
</body>
</html>