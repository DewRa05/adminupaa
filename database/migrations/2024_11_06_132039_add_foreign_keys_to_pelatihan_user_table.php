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
        Schema::table('pelatihan_user', function (Blueprint $table) {
            $table->foreign(['pelatihan_id'])->references(['id'])->on('pelatihan')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelatihan_user', function (Blueprint $table) {
            $table->dropForeign('pelatihan_user_pelatihan_id_foreign');
            $table->dropForeign('pelatihan_user_user_id_foreign');
        });
    }
};
