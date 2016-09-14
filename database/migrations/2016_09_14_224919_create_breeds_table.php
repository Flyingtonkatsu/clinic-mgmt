<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedsTable extends Migration
{
    
    public function up()
    {
        Schema::create('breeds', function(Blueprint $table){
            $table->increments('id');
            $table->char('name', 30);
            $table->integer('species_id');
        });
    }

    
    public function down()
    {
        Schema::drop('breeds');
    }
}
