<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('nasi goreng')) {
            Schema::create('nasi goreng', function (Blueprint $table) {
                $table->id();
                $table->string('nama_nasi goreng');
                $table->string('foto')->nullable();
            });
        }

        if (!Schema::hasTable('kategori_produk')) {
            Schema::create('kategori_produk', function (Blueprint $table) {
                $table->id();
                $table->string('nama_kategori');
            });
        }

        if (!Schema::hasTable('lauk favorit')) {
            Schema::create('lauk favorit', function (Blueprint $table) {
                $table->id();
                $table->string('nama_lauk favorit');
            });
        }

        if (!Schema::hasTable('masakan rumah')) {
            Schema::create('masakan rumah', function (Blueprint $table) {
                $table->id();
                $table->string('nama_masakan rumah');
                $table->string('foto')->nullable();
            });
        }

        if (!Schema::hasTable('produk')) {
            Schema::create('produk', function (Blueprint $table) {
                $table->id();
                $table->string('nama_produk');
                $table->integer('harga');
                $table->string('size')->nullable();
                $table->string('foto')->nullable();
                $table->text('deskripsi')->nullable();
                $table->foreignId('id_kategori')->constrained('kategori_produk')->cascadeOnDelete();
            });
        }

        if (!Schema::hasTable('produk_cabang')) {
            Schema::create('produk_cabang', function (Blueprint $table) {
                $table->id();
                $table->foreignId('id_cabang')->constrained('cabang')->cascadeOnDelete();
                $table->foreignId('id_produk')->constrained('produk')->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_cabang');
        Schema::dropIfExists('produk');
        Schema::dropIfExists('masakan rumah');
        Schema::dropIfExists('lauk favorit');
        Schema::dropIfExists('kategori_produk');
        Schema::dropIfExists('nasi goreng');
    }
};
