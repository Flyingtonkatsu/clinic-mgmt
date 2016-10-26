<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabsTable extends Migration
{
    public function up()
    {
        Schema::create('labs', function(Blueprint $table){
            $table->increments('id');
            $table->char('name');
            $table->float('svc_price', 6, 2);
            $table->integer('kit_id');
        });
    }

    public function down()
    {
        Schema::drop('labs');
    }
}
