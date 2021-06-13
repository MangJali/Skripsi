<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUlanganhariansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulanganharians', function (Blueprint $table) {
            $table->integer('id_uh')->autoIncrement();
            $table->string('nis', 9);
            $table->string('id_kelas');
            // $table->foreign('kodemapel')->references('kodemapel')->on('matapelajarans');
            // $table->foreign('nis')->references('nis')->on('siswas');
            $table->string('ulanganharian1');
            $table->string('ulanganharian2');
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
        Schema::dropIfExists('ulanganharians');
    }
}
