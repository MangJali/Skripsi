<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->string('nis', 9)->primary();
            $table->string('namalengkap');
            $table->string('alamat');
            $table->string('tempatlahir');
            $table->string('tanggallahir');
            $table->string('jeniskelamin');
            $table->string('sekolahumum');
            $table->string('kodekelas');
            $table->foreign('kodekelas')->references('kodekelas')->on('kelases')->delete('cascade');
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
        Schema::dropIfExists('siswas');
    }
}
