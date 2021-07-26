<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertakelasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertakelases', function (Blueprint $table) {
            $table->id();
            $table->integer('id_master');
            $table->string('nis');
            $table->foreign('id_master')->references('id_master')->on('masterkelases')->onDelete('cascade');
            $table->foreign('nis')->references('nis')->on('siswas')->onDelete('cascade');
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
        Schema::dropIfExists('pesertakelases');
    }
}
