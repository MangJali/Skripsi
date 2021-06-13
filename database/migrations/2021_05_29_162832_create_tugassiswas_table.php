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
            $table->string('nis', 9);
            $table->string('id_kelas');
            // $table->foreign('kodemapel')->references('kodemapel')->on('matapelajarans');
            // $table->foreign('nis')->references('nis')->on('siswas');
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
