<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDasarHukumsTable extends Migration
{
    public function up()
    {
        Schema::table('dasar_hukums', function (Blueprint $table) {
            $table->unsignedInteger('created_by_id');

            $table->foreign('created_by_id', 'created_by_fk_876993')->references('id')->on('users');
        });
    }
}
