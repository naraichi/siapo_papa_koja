<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpdsTable extends Migration
{
    public function up()
    {
        Schema::create('skpds', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nm_skpd');

            $table->string('initial')->nullable();

            $table->string('is_sub_unit');

            $table->integer('sub_unit');

            $table->string('is_aktif');

            $table->timestamps();
        });
    }
}
