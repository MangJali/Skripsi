<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUjiantengahsemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ujiantengahsemesters', function (Blueprint $table) {
            $table->integer('id_uts')->autoIncrement();
            $table->string('kodemapel');
            $table->string('nis');
            // $table->foreign('kodemapel')->references('kodemapel')->on('matapelajarans')->delete('cascade');
            // $table->foreign('nis')->references('nis')->on('siswas')->delete('cascade');
            $table->string('ujiantengahsemester');
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
        Schema::dropIfExists('ujiantengahsemesters');
    }
}
