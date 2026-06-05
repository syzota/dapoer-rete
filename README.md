<div align="center">

<img width="1919" height="629" alt="Screenshot 2026-06-05 223013" src="https://github.com/user-attachments/assets/b3e11c07-2e08-479d-b5bb-7bcedce8af80" />

# ◈ Dapoer Mba ReTe
### *Website Informasi & Manajemen Restoran berbasis Laravel*

<p>
  <img src="https://img.shields.io/badge/PHP-Laravel_12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white"/>
  <img src="https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white"/>
  <img src="https://img.shields.io/badge/Frontend-Tailwind_CSS-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white"/>
  <img src="https://img.shields.io/badge/Build-Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white"/>
</p>

<p>
  <a href="https://dapoer-rete.xo.je">
    <img src="https://img.shields.io/badge/◉ Live Website-dapoer--rete.xo.je-FF2D20?style=for-the-badge"/>
  </a>
</p>

> *Website informasi restoran Dapoer Mba ReTe — menampilkan berita, katalog menu, dan sistem manajemen internal berbasis peran (Owner & Pegawai).*

<br/>

| 2 Role | 6 Tabel | 4 Fitur Berita |
|:------:|:-------:|:--------------:|
| Owner & Pegawai | Inti Sistem | CRUD + Search | 

</div>

---

## ◆ Daftar Isi

- [Tentang Proyek](#-tentang-proyek)
- [Arsitektur Sistem](#-arsitektur-sistem)
- [Struktur Database](#-struktur-database)
- [Fitur Unggulan](#-fitur-unggulan)
- [Halaman & Fungsi](#-halaman--fungsi)
- [Struktur Repositori](#-struktur-repositori)
- [Tech Stack](#-tech-stack)
- [Instalasi Lokal](#-instalasi-lokal)
- [Catatan Deployment](#-catatan-deployment)
- [Informasi Akses](#-informasi-akses)

---

## ▸ Tentang Proyek

Proyek ini merupakan **Ujian Akhir Semester mata kuliah Pemrograman Web** — membangun website informasi restoran **Dapoer Mba ReTe** menggunakan framework Laravel 12.

Dapoer Mba ReTe adalah restoran dengan beberapa cabang di Kalimantan Timur (Samarinda, Balikpapan, Tenggarong, Bontang). Website ini berfungsi sebagai wajah publik restoran sekaligus sistem manajemen internal untuk pengelolaan berita, produk, pegawai, dan operasional.

**Rumusan Kebutuhan yang Dipenuhi:**

- Website publik yang menampilkan berita lengkap dengan gambar, isi, author, dan tanggal terbit
- Halaman admin (Owner) untuk mengelola berita: tambah, edit, hapus, lihat, dan cari
- Website dapat diakses secara online melalui hosting

---

## ▸ Arsitektur Sistem

```
┌─────────────┐     ┌──────────────────────────┐     ┌───────────────┐
│   Pengunjung │────▶│   Public Routes           │────▶│   Blade Views │
│   (Publik)   │     │  /, /katalog, /berita     │     │   welcome,    │
└─────────────┘     └──────────────────────────┘     │   katalog,    │
                                                       │   berita      │
┌─────────────┐     ┌──────────────────────────┐     └───────────────┘
│    Owner     │────▶│   Auth + Middleware       │────▶┌───────────────┐
│  (Admin)     │     │  CheckOwner               │     │  Owner Panel  │
└─────────────┘     └──────────────────────────┘     │  Dashboard,   │
                                                       │  Berita CRUD  │
                                                     └───────────────┘

```

---

## ▸ Struktur Database

Model **Relasional** — sistem manajemen restoran dengan beberapa tabel inti yang saling terhubung.

### Tabel `berita` *(fokus UAS)*

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| `id` | bigint, PK | Auto increment |
| `judul` | varchar(200) | Judul berita |
| `slug` | varchar, unique | URL-friendly identifier |
| `gambar` | varchar, nullable | Path gambar (storage/berita) |
| `isi` | text | Konten berita lengkap |
| `author` | varchar(100) | Nama penulis |
| `tanggal_terbit` | date | Tanggal publikasi |
| `status` | enum | `draft` / `published` |
| `created_at`, `updated_at` | timestamp | Otomatis Laravel |

### Tabel `users`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| `id` | bigint, PK | Auto increment |
| `name` | varchar | Username login |
| `password` | varchar | Password (plain — sistem internal) |
| `role` | varchar | `owner` / `pegawai` |

### Tabel `produk` & `kategori_produk`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| `id` | bigint, PK | Auto increment |
| `nama_produk` | varchar | Nama menu |
| `harga` | integer | Harga dalam Rupiah |
| `size` | varchar, nullable | Ukuran/porsi |
| `id_kategori` | FK | Relasi ke `kategori_produk` |
| `deskripsi` | text, nullable | Deskripsi produk |

---

## ▸ Fitur Unggulan

### ① Sistem Berita Publik

Pengunjung dapat melihat daftar berita dan membaca detail artikel lengkap dengan gambar, author, dan tanggal terbit. Berita diurutkan berdasarkan tanggal terbaru.

```
GET  /berita          → Daftar semua berita (published)
GET  /berita/{slug}   → Detail artikel berita
```

### ② Admin Berita (Owner)

Owner dapat mengelola seluruh konten berita melalui panel admin yang dilindungi middleware.

| Aksi | Route | Fungsi |
|------|-------|--------|
| Lihat semua | `GET /owner/berita` | Tampilkan daftar + filter search |
| Tambah | `GET/POST /owner/berita/create` | Form input berita baru |
| Edit | `GET/PUT /owner/berita/{id}/edit` | Ubah data berita |
| Hapus | `DELETE /owner/berita/{id}` | Hapus permanen |
| **Search** | `GET /owner/berita?search=...` | Cari berdasarkan judul, author, isi, status |

### ③ Sistem Autentikasi Berbasis Peran

Login menggunakan session manual (tanpa Laravel Auth default) dengan dua peran: `owner` diarahkan ke `/owner/berita`, `pegawai` ke `/pegawai/dashboard`.

### ④ Upload Gambar

Gambar berita disimpan di `storage/app/public/berita/` menggunakan Laravel filesystem dengan validasi format `jpg, jpeg, png, webp` dan maksimum 2MB.

---

## ▸ Halaman & Fungsi

### Halaman Publik

| Halaman | Route | Fungsi |
|---------|-------|--------|
| Beranda | `/` | Landing page: hero, preview menu, berita terbaru, info cabang |
| Katalog | `/katalog` | Daftar lengkap menu (Nasi Goreng, Ayam, dll) |
| Berita | `/berita` | Daftar semua artikel berita yang dipublikasikan |
| Detail Berita | `/berita/{slug}` | Isi lengkap satu artikel + gambar + author + tanggal |
| Login | `/login` | Form login Owner & Pegawai |

### Panel Owner (Admin)

| Halaman | Route | Fungsi |
|---------|-------|--------|
| Dashboard | `/owner/dashboard` | Statistik berita, produk, berita terbaru |
| **Berita** | `/owner/berita` | **CRUD berita + fitur pencarian** |
| Produk | `/owner/produk` | Kelola menu & harga |
| Pegawai | `/owner/pegawai` | Manajemen akun pegawai |
| Cabang | `/owner/cabang` | Data cabang restoran |
| Laporan | `/owner/laporan` | Laporan keuangan harian/mingguan/bulanan |
| Stok | `/owner/stok` | Monitor stok bahan per cabang |

### Panel Pegawai

| Halaman | Route | Fungsi |
|---------|-------|--------|
| Dashboard | `/pegawai/dashboard` | Ringkasan transaksi hari ini |
| Input Transaksi | `/pegawai/transaksi` | Kasir POS untuk catat pesanan |
| Riwayat | `/pegawai/riwayat` | Histori transaksi cabang |
| Input Stok | `/pegawai/stok` | Lapor stok bahan harian |

---

## ▸ Struktur Repositori

> *Catatan: Repositori ini hanya memuat direktori yang dipush ke GitHub. File konfigurasi, vendor, dan node_modules tidak disertakan.*

```
dapoer-rete/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php          ← Login & logout
│   │   │   ├── BeritaController.php        ← CRUD berita (admin)
│   │   │   ├── PublicBeritaController.php  ← Berita publik
│   │   │   ├── KatalogController.php       ← Halaman katalog
│   │   │   └── OwnerController.php         ← Panel owner
│   │   └── Middleware/
│   │       ├── CheckOwner.php              ← Guard halaman owner
│   └── Models/
│       ├── Berita.php
│       ├── User.php
│       ├── Cabang.php
│       ├── Produk.php
│       └── ...
├── database/
│   └── migrations/
│       ├── ..._create_users_table.php
│       ├── ..._create_fruits_and_products_tables.php
│       ├── ..._create_transaksi_tables.php
│       └── ..._create_berita_table.php     ← Migrasi tabel berita
├── resources/
│   └── views/
│       ├── auth/login.blade.php
│       ├── berita/
│       │   ├── index.blade.php             ← Daftar berita publik
│       │   └── show.blade.php              ← Detail berita publik
│       ├── owner/berita/
│       │   ├── index.blade.php             ← Manajemen berita + search
│       │   ├── create.blade.php            ← Form tambah berita
│       │   └── edit.blade.php              ← Form edit berita
│       ├── layouts/app.blade.php
│       ├── katalog.blade.php
│       └── welcome.blade.php               ← Beranda
└── routes/
    └── web.php                             ← Semua route aplikasi
```

---

## ▸ Tech Stack

<p>
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white"/>
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel&logoColor=white"/>
  <img src="https://img.shields.io/badge/MySQL-Database-4479A1?style=flat-square&logo=mysql&logoColor=white"/>
  <img src="https://img.shields.io/badge/Tailwind_CSS-v4-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white"/>
  <img src="https://img.shields.io/badge/Vite-Build_Tool-646CFF?style=flat-square&logo=vite&logoColor=white"/>
</p>

| Layer | Tools |
|-------|-------|
| Backend | PHP 8.2+, Laravel 12, Eloquent ORM |
| Frontend | Blade Templates, Tailwind CSS v4, Axios |
| Database | MySQL, Laravel Migrations & Seeder |
| Build | Vite, npm |
| Auth | Session-based manual (role: owner / pegawai) |
| Storage | Laravel Filesystem (public disk) |
| Hosting | [dapoer-rete.xo.je](https://dapoer-rete.xo.je) |

---

## ▸ Instalasi Lokal

```bash
# 1. Clone repositori
git clone https://github.com/[username]/dapoer-rete.git
cd dapoer-rete

# 2. Install dependencies
composer install
npm install

# 3. Konfigurasi environment
cp .env.example .env
php artisan key:generate

# 4. Atur database di .env
# DB_CONNECTION=mysql
# DB_DATABASE=dapoer_rete
# DB_USERNAME=root
# DB_PASSWORD=

# 5. Jalankan migrasi & seeder
php artisan migrate --seed

# 6. Link storage
php artisan storage:link

# 7. Build assets
npm run build

# 8. Jalankan server
php artisan serve
```

> Akses di `http://localhost:8000`

---

## ▸ Catatan Deployment

Repositori ini hanya memuat direktori berikut karena alasan privasi kode:

- `app/` — Controllers, Models, Middleware
- `database/` — Migrations & Seeders
- `resources/` — Views, CSS, JS
- `routes/` — Route definitions

File seperti `.env`, `vendor/`, `node_modules/`, dan `storage/` **tidak disertakan** dan harus dikonfigurasi ulang saat deployment.

---

## ▸ Informasi Akses

> *Kredensial lengkap tersedia di halaman Lampiran laporan proyek.*

| Role | URL |
|------|-----|
| Website Publik | [dapoer-rete.xo.je](https://dapoer-rete.xo.je) |
| Halaman Login | [dapoer-rete.xo.je/login](https://dapoer-rete.xo.je/login) |
| Panel Owner | [dapoer-rete.xo.je/owner/berita](https://dapoer-rete.xo.je/owner/berita) |

---
  > **Mata Kuliah** — Web-Based Programming
  > **Program Studi** — Sistem Informasi · Fakultas Teknik · Universitas Mulawarman · 2025/2026
  
  ---
  
  <div align="center">
  
  *© 2025 · Sistem Informasi · Fakultas Teknik · Universitas Mulawarman*
  
  </div>


<div align="center">

*© 2025/2026 · Ujian Akhir Semester · Pemrograman Web · Universitas Mulawarman*

</div>
