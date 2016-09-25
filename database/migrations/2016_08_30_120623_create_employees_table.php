<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->char('number', 6);
            $table->char('firstname', 30);
            $table->char('lastname', 30);
            $table->integer('position_id');
            $table->char('initials', 3);
            $table->integer('login_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('employees');
    }
}
