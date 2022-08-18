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
        Schema::table('pengembalian_detail', function (Blueprint $table) {
            $table->foreign('pengembalian_id')
                ->references('id')
                ->on('pengembalian')
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
        Schema::table('pengembalian_detail', function (Blueprint $table) {
            $table->dropForeign([
                'pengembalian_detail_pengembalian_id_foreign',
                'pengembalian_detail_buku_id_foreign',
            ]);
        });
    }
};
