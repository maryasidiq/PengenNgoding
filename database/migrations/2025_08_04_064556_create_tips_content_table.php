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
        Schema::create('tips_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tips_id');
            $table->string('judul', 150);
            $table->text('deskripsi')->nullable();
            $table->string('gambar', 255);
            $table->timestamps(); // Tambahkan ini

            $table->foreign('tips_id')
                  ->references('id')
                  ->on('tips')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('tips_content');
    }
};
