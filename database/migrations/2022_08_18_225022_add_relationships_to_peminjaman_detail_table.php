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
        Schema::table('peminjaman_detail', function (Blueprint $table) {
            $table->foreign('peminjaman_id')
                ->references('id')
                ->on('peminjaman')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('buku_id')
                ->references('id')
                ->on('buku')
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
        Schema::table('peminjaman_detail', function (Blueprint $table) {
            $table->dropForeign([
                'peminjaman_detail_peminjaman_id_foreign',
                'peminjaman_detail_buku_id_foreign',
            ]);
        });
    }
};
