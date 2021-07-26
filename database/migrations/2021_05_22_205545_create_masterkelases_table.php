<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterKelasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterkelases', function (Blueprint $table) {
            $table->integer('id_master')->primary();
            $table->integer('id_kelas');
            $table->string('id_mapel');
            $table->string('nip');
            $table->integer('thnakademik');
            $table->string('semester');
            $table->char('id_rombel');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelases')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_rombel')->references('id_rombel')->on('rombels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id_mapel')->on('matapelajarans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nip')->references('nip')->on('tenagapendidik')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('masterkelaseskelases');
    }
}
