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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign(['jurusan_id'])->references(['id'])->on('jurusans')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['kelas_id'])->references(['id'])->on('kelas')->onUpdate('restrict')->onDelete('set null');
            $table->foreign(['prodi_id'])->references(['id'])->on('prodis')->onUpdate('restrict')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_jurusan_id_foreign');
            $table->dropForeign('users_kelas_id_foreign');
            $table->dropForeign('users_prodi_id_foreign');
        });
    }
};
