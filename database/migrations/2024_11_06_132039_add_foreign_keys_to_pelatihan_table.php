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
        Schema::table('pelatihan', function (Blueprint $table) {
            $table->foreign(['kategori_id'])->references(['id'])->on('kategori')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['lsp_id'])->references(['id'])->on('lsp')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelatihan', function (Blueprint $table) {
            $table->dropForeign('pelatihan_kategori_id_foreign');
            $table->dropForeign('pelatihan_lsp_id_foreign');
        });
    }
};
