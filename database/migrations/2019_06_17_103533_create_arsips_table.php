<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArsipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('user_id')->unsigned(); //pemilik
            $table->integer('arsip_id')->unsigned();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });

        Schema::table('arsips', function (Blueprint $table) {
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
        Schema::dropIfExists('arsips');
        Schema::table('arsips', function (Blueprint $table) {
            $table->dropColumn('arsip_id');
        });
    }
}
