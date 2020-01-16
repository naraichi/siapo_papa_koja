<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnduhansTable extends Migration
{
    public function up()
    {
        Schema::create('unduhans', function (Blueprint $table) {
            $table->increments('id');

            $table->string('uraian');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
