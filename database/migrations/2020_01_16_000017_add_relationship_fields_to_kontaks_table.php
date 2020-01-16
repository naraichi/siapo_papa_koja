<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToKontaksTable extends Migration
{
    public function up()
    {
        Schema::table('kontaks', function (Blueprint $table) {
            $table->unsignedInteger('created_by_id');

            $table->foreign('created_by_id', 'created_by_fk_877188')->references('id')->on('users');
        });
    }
}
