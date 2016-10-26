<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliesMstrTable extends Migration
{
    
    public function up()
    {
        Schema::create('supplies_mstr', function(Blueprint $table){
            $table->increments('id');
            $table->char('description');
            $table->integer('category_id');
            $table->char('uom', 10);
            $table->integer('uom_qty');
            $table->float('selling_price', 6, 2);
            $table->float('cost', 8, 2);
        });
    }

    public function down()
    {
        Schema::drop('supplies_mstr');
    }
}
