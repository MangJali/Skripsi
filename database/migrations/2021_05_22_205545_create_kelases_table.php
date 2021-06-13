<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelases', function (Blueprint $table) {
            $table->integer('id_kelas')->primary();
            $table->integer('id_mapel');
            $table->string('nip');
            $table->integer('tahnakademik');
            $table->boolean('semester');
            $table->string('kelas');
            $table->char('rombel');
            // $table->foreign('id_semester')->references('id_semester')->on('semester');
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
        Schema::dropIfExists('kelases');
    }
}
