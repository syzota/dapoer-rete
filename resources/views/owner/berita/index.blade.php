<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita - Dapoer Mba ReTe</title>

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
        input {
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

        .btn-primary:hover,
        .btn-soft:hover,
        .btn-danger:hover {
            transform: translateY(-2px);
        }

        .btn-soft {
            background: var(--yellow-soft);
            color: var(--red-dark);
        }

        .btn-danger {
            background: var(--red-dark);
            color: white;
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

        .content-card {
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid rgba(255, 255, 255, 0.86);
            box-shadow: var(--shadow-card);
            padding: 22px;
            backdrop-filter: blur(10px);
        }

        .search-row {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-row input {
            flex: 1;
            min-height: 46px;
            border-radius: 999px;
            border: 1px solid rgba(91, 21, 24, 0.14);
            background: rgba(255, 255, 255, 0.9);
            padding: 0 16px;
            color: var(--text-dark);
            outline: none;
            font-weight: 600;
        }

        .search-row input:focus {
            border-color: var(--orange);
            box-shadow: 0 0 0 4px rgba(240, 90, 0, 0.10);
        }

        .table-wrap {
            overflow-x: auto;
            border-radius: 22px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
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

        .thumb {
            width: 88px;
            height: 66px;
            border-radius: 16px;
            object-fit: cover;
            background: var(--cream);
        }

        .news-title {
            color: var(--red-dark);
            font-weight: 800;
            margin-bottom: 5px;
            line-height: 1.35;
        }

        .news-excerpt {
            color: rgba(68, 22, 25, 0.62);
            line-height: 1.5;
        }

        .badge {
            display: inline-flex;
            padding: 7px 11px;
            border-radius: 999px;
            background: rgba(242, 240, 168, 0.9);
            color: var(--red-dark);
            font-size: 12px;
            font-weight: 800;
        }

        .badge.published {
            background: rgba(109, 158, 54, 0.16);
            color: #42651f;
        }

        .badge.draft {
            background: rgba(240, 90, 0, 0.14);
            color: var(--orange);
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
        }

        .mobile-news-list {
            display: none;
        }

        .news-card {
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.72);
            border: 1px solid rgba(91, 21, 24, 0.08);
            padding: 14px;
            display: grid;
            gap: 12px;
        }

        .news-card-top {
            display: grid;
            grid-template-columns: 82px 1fr;
            gap: 12px;
            align-items: start;
        }

        .news-card .thumb {
            width: 82px;
            height: 82px;
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

            .search-row {
                flex-direction: column;
            }

            .search-row .btn {
                width: 100%;
            }
        }

        @media (max-width: 720px) {
            .table-wrap {
                display: none;
            }

            .mobile-news-list {
                display: grid;
                gap: 12px;
            }

            .page-title h1 {
                font-size: 31px;
            }

            .page-title p {
                font-size: 14px;
            }

            .actions .btn,
            .news-card form,
            .news-card form .btn {
                width: 100%;
            }

            .actions {
                display: grid;
                grid-template-columns: 1fr;
            }

            .modal-actions {
                display: grid;
                grid-template-columns: 1fr;
            }

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
                    <h1>Kelola Berita</h1>
                    <p>Tambah, edit, hapus, dan cari berita/informasi terbaru Dapoer Mba ReTe.</p>
                </div>

                <a href="{{ route('owner.berita.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Tambah Berita
                </a>
            </section>

            @if(session('success'))
                <div class="alert">
                    <i class="fa-solid fa-circle-check"></i>
                    {{ session('success') }}
                </div>
            @endif

            <section class="content-card">
                <form action="{{ route('owner.berita.index') }}" method="GET" class="search-row">
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Cari berdasarkan judul, author, isi, atau status..."
                    >

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Cari
                    </button>

                    <a href="{{ route('owner.berita.index') }}" class="btn btn-soft">
                        Reset
                    </a>
                </form>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Author</th>
                                <th>Tanggal Terbit</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($berita as $item)
                                <tr>
                                    <td>
                                        @if($item->gambar)
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="thumb">
                                        @else
                                            <img src="{{ asset('assets/images/logo.png') }}" alt="{{ $item->judul }}" class="thumb">
                                        @endif
                                    </td>

                                    <td>
                                        <div class="news-title">{{ $item->judul }}</div>
                                        <div class="news-excerpt">
                                            {{ Str::limit(strip_tags($item->isi), 85) }}
                                        </div>
                                    </td>

                                    <td>{{ $item->author }}</td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d F Y') }}
                                    </td>

                                    <td>
                                        <span class="badge {{ $item->status }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>

                                    <td>
                                        <div class="actions">
                                            <a href="{{ route('owner.berita.edit', $item->id) }}" class="btn btn-soft">
                                                <i class="fa-solid fa-pen"></i>
                                                Edit
                                            </a>

                                            <form id="delete-form-{{ $item->id }}" action="{{ route('owner.berita.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="button"
                                                    class="btn btn-danger delete-trigger"
                                                    data-form="delete-form-{{ $item->id }}"
                                                    data-title="{{ $item->judul }}"
                                                >
                                                    <i class="fa-solid fa-trash"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="empty">
                                        Belum ada berita. Klik tombol Tambah Berita untuk membuat informasi pertama.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mobile-news-list">
                    @forelse($berita as $item)
                        <article class="news-card">
                            <div class="news-card-top">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="thumb">
                                @else
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="{{ $item->judul }}" class="thumb">
                                @endif

                                <div>
                                    <div class="news-title">{{ $item->judul }}</div>
                                    <div class="news-excerpt">
                                        {{ Str::limit(strip_tags($item->isi), 90) }}
                                    </div>
                                </div>
                            </div>

                            <div style="display: flex; flex-wrap: wrap; gap: 8px; align-items: center;">
                                <span class="badge {{ $item->status }}">{{ ucfirst($item->status) }}</span>
                                <span style="font-size: 13px; color: rgba(68, 22, 25, 0.62);">
                                    {{ $item->author }} • {{ \Carbon\Carbon::parse($item->tanggal_terbit)->translatedFormat('d M Y') }}
                                </span>
                            </div>

                            <div class="actions">
                                <a href="{{ route('owner.berita.edit', $item->id) }}" class="btn btn-soft">
                                    <i class="fa-solid fa-pen"></i>
                                    Edit
                                </a>

                                <form id="delete-mobile-form-{{ $item->id }}" action="{{ route('owner.berita.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="button"
                                        class="btn btn-danger delete-trigger"
                                        data-form="delete-mobile-form-{{ $item->id }}"
                                        data-title="{{ $item->judul }}"
                                    >
                                        <i class="fa-solid fa-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </article>
                    @empty
                        <div class="empty">
                            Belum ada berita. Klik tombol Tambah Berita untuk membuat informasi pertama.
                        </div>
                    @endforelse
                </div>
            </section>
        </main>
    </div>

    <div class="modal" id="deleteModal">
        <div class="modal-backdrop" id="modalBackdrop"></div>

        <div class="modal-card">
            <div class="modal-icon">
                <i class="fa-solid fa-trash"></i>
            </div>

            <h3>Hapus berita?</h3>
            <p>
                Berita <strong id="deleteTitle">ini</strong> akan dihapus dari sistem.
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

        if (confirmDelete) {
            confirmDelete.addEventListener('click', function () {
                if (selectedDeleteForm) {
                    selectedDeleteForm.submit();
                }
            });
        }

        if (cancelDelete) {
            cancelDelete.addEventListener('click', closeDeleteModal);
        }

        if (modalBackdrop) {
            modalBackdrop.addEventListener('click', closeDeleteModal);
        }

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && deleteModal.classList.contains('is-open')) {
                closeDeleteModal();
            }
        });
    </script>
</body>
</html>