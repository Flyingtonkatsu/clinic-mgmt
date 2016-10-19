<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePharmacyTable extends Migration
{
    
    public function up()
    {
        Schema::create('pharmacy', function(Blueprint $table){
            $table->timestamps();
            $table->integer('med_id');
            $table->integer('qty_onhand');
            $table->integer('qty_safe');
            $table->integer('qty_debit');
            $table->integer('qty_credit');
            $table->integer('request_id');
            $table->char('delivery_cert_num');
        });
    }

    public function down()
    {
        Schema::drop('pharmacy');
    }
}
