<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengumumenTable extends Migration
{
    public function up()
    {
        Schema::create('pengumumen', function (Blueprint $table) {
            $table->increments('id');

            $table->string('uraian');

            $table->date('is_arsip')->nullable();

            $table->timestamps();
        });
    }
}
