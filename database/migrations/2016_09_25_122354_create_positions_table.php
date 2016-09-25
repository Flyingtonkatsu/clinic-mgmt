<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{

    public function up()
    {
        Schema::create('positions', function(Blueprint $table){
            $table->increments('id');
            $table->char('name', 20);
            $table->integer('access_id');
        });
    }

    public function down()
    {
        Schema::drop('positions');
    }
}
