<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $berita = Berita::when($search, function ($query) use ($search) {
                $query->where('judul', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%")
                    ->orWhere('isi', 'like', "%{$search}%")
                    ->orWhere('status', 'like', "%{$search}%");
            })
            ->orderBy('tanggal_terbit', 'desc')
            ->get();

        return view('owner.berita.index', compact('berita', 'search'));
    }

    public function create()
    {
        return view('owner.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:200',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'isi' => 'required|string',
            'author' => 'required|string|max:100',
            'tanggal_terbit' => 'required|date',
            'status' => 'required|in:draft,published',
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . time(),
            'gambar' => $gambarPath,
            'isi' => $request->isi,
            'author' => $request->author,
            'tanggal_terbit' => $request->tanggal_terbit,
            'status' => $request->status,
        ]);

        return redirect('/owner/berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        return view('owner.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:200',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'isi' => 'required|string',
            'author' => 'required|string|max:100',
            'tanggal_terbit' => 'required|date',
            'status' => 'required|in:draft,published',
        ]);

        $gambarPath = $berita->gambar;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . $berita->id,
            'gambar' => $gambarPath,
            'isi' => $request->isi,
            'author' => $request->author,
            'tanggal_terbit' => $request->tanggal_terbit,
            'status' => $request->status,
        ]);

        return redirect('/owner/berita')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect('/owner/berita')->with('success', 'Berita berhasil dihapus!');
    }
}