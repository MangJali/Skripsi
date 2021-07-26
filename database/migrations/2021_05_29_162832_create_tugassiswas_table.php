<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTugassiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugassiswas', function (Blueprint $table) {
            $table->integer('id_tugas')->autoIncrement();
            $table->integer('id');
            $table->string('nis');
            $table->integer('id_kelas');
            $table->string('id_mapel');
            $table->string('nip');
            $table->foreign('id')->references('id')->on('pesertakelases')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelases')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id_mapel')->on('matapelajarans')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tugas1')->nullable();
            $table->integer('tugas2')->nullable();
            $table->integer('tugas3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugassiswas');
    }
}
