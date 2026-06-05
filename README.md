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
| Owner & User | Inti Sistem | CRUD + Search | 

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

---

## ▸ Dokumentasi User Interface (UI)

> *Berikut adalah tampilan antarmuka (interface) dari website Dapoer Mba ReTe, mencakup halaman publik dan dashboard manajemen internal.*

### 🌐 Halaman Publik (Responsive Design)

<table width="100%">
  <tr>
    <td width="50%" align="center">
      <b> Landing Page / Beranda</b>
      <br/><br/>
      <img width="1920" height="1200" alt="image" src="https://github.com/user-attachments/assets/582299a8-cd91-4620-9493-26c516f4f26e" />
      <br/>
      <i>Menampilkan hero section, preview menu unggulan, dan potret cabang terdekat.</i>
    </td>
    <td width="50%" align="center">
      <b>Katalog Menu Kuliner</b>
      <br/><br/>
      <img width="1920" height="1200" alt="image" src="https://github.com/user-attachments/assets/39ce1d6b-758a-43c3-9d3f-fd938ede60eb" />
      <br/>
      <i>Daftar lengkap hidangan rumah yang bisa dipesan secara takeaway atau delivery.</i>
    </td>
  </tr>
  <tr>
    <td width="50%" align="center">
      <b>Portal Berita & Informasi</b>
      <br/><br/>
      <img width="1920" height="1200" alt="image" src="https://github.com/user-attachments/assets/9f8e61b1-3a5a-42f7-9348-c9c418398e7e" />
      <br/>
      <i>Kumpulan artikel, promo, dan kabar terbaru seputar Dapoer Mba ReTe.</i>
    </td>
    <td width="50%" align="center">
      <b>Detail Artikel Berita</b>
      <br/><br/>
      <img width="857" height="1138" alt="image" src="https://github.com/user-attachments/assets/de77e536-cbe1-41b3-8299-d53592989ac3" />
      <br/>
      <i>Tampilan penuh konten artikel yang dilengkapi info author, tanggal terbit, dan gambar.</i>
    </td>
  </tr>
</table>

<br/>

### Panel Manajemen (Owner & Admin)

<table width="100%">
  <tr>
    <td width="50%" align="center">
      <b> Form Login</b>
      <br/><br/>
      <img width="1919" height="1002" alt="image" src="https://github.com/user-attachments/assets/2b26541e-5421-4587-bc8a-d45b5b08eb37" />
      <br/>
      <i>Ringkasan data statistik berupa total berita, produk aktif, dan grafik penjualan.</i>
    </td>
    <td width="50%" align="center">
      <b> Manajemen & CRUD Berita</b>
      <br/><br/>
      <img width="1919" height="995" alt="image" src="https://github.com/user-attachments/assets/ae80ebda-90c5-4342-8e36-b18d13f2052b" />
      <br/>
      <i>Tabel data berita lengkap dengan fitur Live Search, filter status, dan tombol aksi cepat.</i>
    </td>
  </tr>
  <tr>
    <td width="50%" align="center">
      <b> Form Input & Validasi Berita</b>
      <br/><br/>
      <img width="1903" height="1191" alt="image" src="https://github.com/user-attachments/assets/c90757c1-e723-469e-8ccf-01f2aa6ce832" />
      <br/>
      <i>Form dinamis untuk menambah konten artikel baru beserta upload media gambar (max 2MB).</i>
    </td>
  </tr>
</table>

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
