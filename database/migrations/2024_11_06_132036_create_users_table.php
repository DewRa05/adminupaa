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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('nim')->nullable();
            $table->string('nidn')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->unsignedBigInteger('prodi_id')->nullable()->index('users_prodi_id_foreign');
            $table->unsignedBigInteger('kelas_id')->nullable()->index('users_kelas_id_foreign');
            $table->timestamps();
            $table->unsignedBigInteger('jurusan_id')->nullable()->index('users_jurusan_id_foreign');
            $table->string('profile')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
