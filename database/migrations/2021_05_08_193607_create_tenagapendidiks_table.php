<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenagapendidiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenagapendidiks', function (Blueprint $table) {
            $table->bigInteger('nip')->primary();
            $table->string('namapendidik');
            $table->string('alamat');
            $table->char('jeniskelamin');
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
        Schema::dropIfExists('tenagapendidiks');
    }
}
