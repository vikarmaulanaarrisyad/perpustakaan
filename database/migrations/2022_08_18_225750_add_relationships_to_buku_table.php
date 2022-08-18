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
        Schema::table('buku', function (Blueprint $table) {
            $table->foreign('penerbit_id')
                ->references('id')
                ->on('penerbit')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('pengarang_id')
                ->references('id')
                ->on('pengarang')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('rak_id')
                ->references('id')
                ->on('rak')
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
        Schema::table('buku', function (Blueprint $table) {
            $table->dropForeign([
                'buku_penerbit_id_foreign',
                'buku_pengarang_id_foreign',
                'buku_rak_id_foreign',
            ]);
        });
    }
};
