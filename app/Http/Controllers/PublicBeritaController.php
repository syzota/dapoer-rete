<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class PublicBeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::where('status', 'published')
            ->orderBy('tanggal_terbit', 'desc')
            ->get();

        return view('berita.index', compact('berita'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $beritaLainnya = Berita::where('status', 'published')
            ->where('id', '!=', $berita->id)
            ->orderBy('tanggal_terbit', 'desc')
            ->take(3)
            ->get();

        return view('berita.show', compact('berita', 'beritaLainnya'));
    }
}