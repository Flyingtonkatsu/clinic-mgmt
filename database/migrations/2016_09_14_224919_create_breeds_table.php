<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedsTable extends Migration
{
    
    public function up()
    {
        Schema::create('breeds', function(Blueprint $table){
            $table->char('name', 30);
            $table->char('species', 30);
        });
    }

    
    public function down()
    {
        Schema::drop('breeds');
    }
}
