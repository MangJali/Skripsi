<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumToAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absensis', function (Blueprint $table) {
            $table->integer('id');
            $table->string("nis");
            $table->integer("id_kelas");
            $table->string('id_mapel');
            $table->string('nip');
            $table->foreign('id')->references('id')->on('pesertakelases')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id_mapel')->on('matapelajarans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nis')->references('nis')->on('siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nip')->references('nip')->on('tenagapendidiks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absensis', function (Blueprint $table) {
            //
        });
    }
}
