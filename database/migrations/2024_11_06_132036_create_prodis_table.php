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
        Schema::create('prodis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_prodi')->unique('prodis_nama_unique');
            $table->timestamps();
            $table->unsignedBigInteger('jurusan_id')->nullable()->index('prodis_jurusan_id_foreign');
            $table->string('nama_jurusan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodis');
    }
};
