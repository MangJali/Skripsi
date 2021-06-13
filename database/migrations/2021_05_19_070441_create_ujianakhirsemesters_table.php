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
            $table->string('nis', 9);
            $table->string('id_kelas');
            // $table->foreign('kodemapel')->references('kodemapel')->on('matapelajarans');
            // $table->foreign('nis')->references('nis')->on('siswas');
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
