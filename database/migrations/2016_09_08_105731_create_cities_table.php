<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
   
    public function up()
    {
        Schema::create('cities', function(Blueprint $table){
            $table->increments('id');
            $table->char('name', 20);
        });
    }

   
    public function down()
    {
        Schema::drop('cities');
    }
}
