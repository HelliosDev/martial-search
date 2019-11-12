<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ownerships', function (Blueprint $table) {
            $table->bigIncrements('id_kepemilikan');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_tempat');
            $table->enum('hari_latihan', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
            $table->time('jadwal_mulai');
            $table->time('jadwal_berakhir');
            $table->double('biaya', 11, 2);
            $table->string('beladiri', 255);
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_tempat')->references('id_tempat')->on('dojos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ownerships');
    }
}
