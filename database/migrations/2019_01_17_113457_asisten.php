<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Asisten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('asisten', function (Blueprint $table) {
        //   $table->string('nim');
        //   $table->string('no_anggota')->unique();
        //
        //   $table->foreign('nim')->references('nim')->on('users')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::drop('asisten');
    }
}
