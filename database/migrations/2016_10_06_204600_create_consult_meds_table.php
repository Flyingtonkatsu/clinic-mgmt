<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultMedsTable extends Migration
{
   
    public function up()
    {
        Schema::create('med_requests', function(Blueprint $table){
            $table->increments('id');
            $table->integer('med_id');
            $table->integer('consult_id');
            $table->integer('qty');
        });
    }

   
    public function down()
    {
        Schema::drop('consult_meds');
    }
}
