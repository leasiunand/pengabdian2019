<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArsipSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsip_surats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('surat_id')->unsigned();
            $table->date('tanggal');
            $table->integer('arsip_id')->unsigned();
            $table->timestamps();

            $table->foreign('surat_id')->references('id')->on('surats')->onUpdate('cascade');
            $table->foreign('arsip_id')->references('id')->on('arsips')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsip_surats');
    }
}
