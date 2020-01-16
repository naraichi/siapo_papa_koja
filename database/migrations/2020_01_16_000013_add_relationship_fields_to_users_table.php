<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('skpd_id')->nullable();

            $table->foreign('skpd_id', 'skpd_fk_875675')->references('id')->on('skpds');
        });
    }
}
