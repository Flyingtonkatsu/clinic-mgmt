<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultsTable extends Migration
{
    
    public function up(){
        Schema::create('consults', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->integer('client_id');
            $table->integer('patient_id');
            $table->integer('reg_id');
            
            $table->char('weight');
            $table->char('purpose');
            $table->char('txt_examination');
            $table->char('txt_diff_diag');
            $table->char('txt_consult_diag');
            $table->char('txt_notes');
            $table->char('txt_regime_script');
        });
    }

    public function down(){
        Schema::drop('consults');
    }
}
