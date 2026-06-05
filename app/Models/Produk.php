<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'nama_produk',
        'harga',
        'size',
        'foto',
        'deskripsi',
        'id_kategori'
    ];

    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'id_kategori');
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_produk');
    }

    public function produkCabang()
    {
        return $this->hasMany(ProdukCabang::class, 'id_produk');
    }
}