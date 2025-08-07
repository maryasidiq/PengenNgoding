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
        Schema::create('video', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 150);
            $table->string('judul', 150);
            $table->text('short_deskripsi');
            $table->text('long_deskripsi')->nullable();
            $table->string('kategori', 100)->nullable();
            $table->string('gambar', 255)->nullable();     // path/URL gambar
            $table->date('dibuat_pada')->nullable();       // tanggal proyek dibuat
            $table->timestamps(); // waktu pembuatanA
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video');
    }
};
