<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeciesTable extends Migration
{
    
    public function up()
    {
        Schema::create('species', function(Blueprint $table){
            $table->char('name', 30);
        });
    }

    
    public function down()
    {
        Schema::drop('species');
    }
}
