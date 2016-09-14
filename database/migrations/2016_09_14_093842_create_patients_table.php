<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    
    public function up()
    {
        Schema::create('patients', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();

            $table->char('name', 30);
            $table->char('species', 15);
            $table->char('breed', 30);
            $table->char('gender', 1);
            $table->char('color', 30);
            $table->char('birthdate', 20);
            $table->boolean('neutered');
            $table->integer('client_id'); // foreign key of client/owner 
        });
    }

    
    public function down()
    {
        Schema::drop('patients');
    }
}
