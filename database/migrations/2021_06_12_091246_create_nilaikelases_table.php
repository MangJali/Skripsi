<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaikelasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilaikelases', function (Blueprint $table) {
            $table->integer('id_nilaikelas');
            $table->string('nis', 9);
            $table->integer('id_kelas');
            $table->integer('id_nilai');
            $table->integer('nilai_ke');
            $table->integer('nilai');
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
        Schema::dropIfExists('nilaikelases');
    }
}
