<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedsTable extends Migration
{
   
    public function up()
    {
        Schema::create('meds', function(Blueprint $table){
            $table->increments('id');
            $table->char('name', 30);
            $table->integer('qty_onhand');
            $table->integer('qty_minimum');
        });
    }

    public function down()
    {
        Schema::drop('meds');
    }
}
