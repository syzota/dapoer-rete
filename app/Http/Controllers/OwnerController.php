<?php

namespace App\Http\Controllers;

use App\Models\Berita;  
use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function dashboard()
    {
        return redirect('/owner/berita');
    }

    public function produk()
    {
        $produk = Produk::with('kategori')
            ->orderBy('id', 'desc')
            ->get();

        $kategori = KategoriProduk::orderBy('nama_kategori', 'asc')->get();

        return view('owner.produk', compact('produk', 'kategori'));
    }

    public function storeProduk(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'size' => 'nullable|string|max:100',
            'id_kategori' => 'required|exists:kategori_produk,id',
            'deskripsi' => 'nullable|string',
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'size' => $request->size,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/owner/produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function updateProduk(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'size' => 'nullable|string|max:100',
            'id_kategori' => 'required|exists:kategori_produk,id',
            'deskripsi' => 'nullable|string',
        ]);

        $produk = Produk::findOrFail($id);

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'size' => $request->size,
            'id_kategori' => $request->id_kategori,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/owner/produk')->with('success', 'Produk berhasil diperbarui!');
    }

    public function deleteProduk($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect('/owner/produk')->with('success', 'Produk berhasil dihapus!');
    }
}