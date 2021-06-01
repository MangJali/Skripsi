<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatapelajaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matapelajarans', function (Blueprint $table) {
            $table->string('kodemapel')->primary();
            $table->string('matapelajaran');
            $table->string('nip');
            $table->integer('id_semester');
            $table->foreign('nip')->references('nip')->on('guru')->delete('cascade');
            $table->foreign('id_semester')->references('id_semester')->on('semester')->delete('cascade');
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
        Schema::dropIfExists('matapelajarans');
    }
}
