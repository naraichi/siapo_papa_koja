<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDasarHukumsTable extends Migration
{
    public function up()
    {
        Schema::create('dasar_hukums', function (Blueprint $table) {
            $table->increments('id');

            $table->string('uraian');

            $table->string('nomor');

            $table->date('tahun');

            $table->timestamps();
        });
    }
}
