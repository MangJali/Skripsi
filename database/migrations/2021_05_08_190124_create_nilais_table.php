<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->char('kodemapel', 5);
            $table->string('namamapel');
            $table->integer('tugas1');
            $table->integer('tugas2');
            $table->integer('tugas3');
            $table->integer('tugas4');
            $table->integer('ulanganharian');
            $table->integer('ujiantengahsemester');
            $table->integer('tugas5');
            $table->integer('ujianakhirsemester');
            $table->integer('nilaiakhir');
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
        Schema::dropIfExists('nilais');
    }
}
