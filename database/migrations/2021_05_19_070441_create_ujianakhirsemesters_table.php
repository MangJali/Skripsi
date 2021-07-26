<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjianakhirsemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujianakhirsemesters', function (Blueprint $table) {
            $table->integer('id_uas')->autoIncrement();
            $table->integer('id');
            $table->string('nis');
            $table->integer('id_kelas');
            $table->string('id_mapel');
            $table->string('nip');
            $table->foreign('id')->references('id')->on('pesertakelases')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelases')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id_mapel')->on('matapelajarans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nis')->references('nis')->on('siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ujianakhirsemester');
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
        Schema::dropIfExists('ujianakhirsemesters');
    }
}
