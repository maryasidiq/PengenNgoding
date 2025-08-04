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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->text('deskripsi');
            $table->string('kategori', 100)->nullable();
            $table->string('gambar', 255)->nullable();     // path/URL gambar
            $table->string('link', 255)->nullable();       // link eksternal
            $table->string('screenshot', 255)->nullable(); // screenshot tambahan
            $table->date('dibuat_pada')->nullable();       // tanggal proyek dibuat
            $table->timestamps(); // waktu pembuatan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
