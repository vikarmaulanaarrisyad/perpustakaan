<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengembalian', function (Blueprint $table) {
            $table->foreign('peminjaman_id')
                ->references('id')
                ->on('peminjaman')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('anggota_id')
                ->references('id')
                ->on('anggota')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengembalian', function (Blueprint $table) {
            $table->dropForeign([
                'pengembalian_peminjaman_id_foreign',
                'pengembalian_anggota_id_foreign',
            ]);
        });
    }
};
