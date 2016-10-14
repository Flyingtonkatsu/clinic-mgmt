<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabRequestsTable extends Migration
{
    public function up(){
        Schema::create("lab_requests", function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();

            $table->integer('lab_id');
            $table->integer('consult_id');
            $table->char('results');
            $table->boolean('completed');
        });
    }

    public function down(){
        Schema::drop('lab_requests');
    }
}
