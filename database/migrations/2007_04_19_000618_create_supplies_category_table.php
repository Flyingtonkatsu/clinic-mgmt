<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesCategoryTable extends Migration
{
   
    public function up()
    {
        Schema::create('supplies_categories', function(Blueprint $table){
            $table->increments('id');
            $table->char('name', 25);
        });
    }

    public function down()
    {
        Schema::drop('supplies_categories');
    }
}
