<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPengumumenTable extends Migration
{
    public function up()
    {
        Schema::table('pengumumen', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_fk_877028')->references('id')->on('users');
        });
    }
}
