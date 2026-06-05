<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class KatalogController extends Controller
{
    public function index()
    {
        $nasiGoreng = Produk::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->where('nama_kategori', 'Nasi Goreng');
            })
            ->orderBy('id')
            ->get();

        $ayamGoreng = Produk::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->where('nama_kategori', 'Ayam Goreng');
            })
            ->orderBy('id')
            ->get();

        $produkLainnya = Produk::with('kategori')
            ->whereHas('kategori', function ($query) {
                $query->whereNotIn('nama_kategori', ['Nasi Goreng', 'Ayam Goreng']);
            })
            ->orderBy('id')
            ->get();

        return view('katalog', compact(
            'nasiGoreng',
            'ayamGoreng',
            'produkLainnya'
        ));
    }
}