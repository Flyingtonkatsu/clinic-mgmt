<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    
    public function up()
    {
        Schema::create('payments', function(Blueprint $table){
            $table->timestamps();
            $table->increments('id');
            $table->integer('consult_id');
            $table->integer('client_id');
            $table->integer('patient_id');
            $table->char('item');
            $table->integer('price');
            $table->integer('qty');
            $table->boolean('paid');
            $table->boolean('refused');
        });
    }

    public function down()
    {
        Schema::drop('payments');
    }
}
