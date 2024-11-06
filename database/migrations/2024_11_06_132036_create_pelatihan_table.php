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
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->decimal('harga', 10);
            $table->integer('kuota');
            $table->unsignedBigInteger('kategori_id')->index('pelatihan_kategori_id_foreign');
            $table->unsignedBigInteger('lsp_id')->index('pelatihan_lsp_id_foreign');
            $table->string('jenis_pelatihan');
            $table->date('tanggal_pendaftaran');
            $table->date('berakhir_pendaftaran');
            $table->text('deskripsi');
            $table->timestamps();
            $table->string('gambar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihan');
    }
};
