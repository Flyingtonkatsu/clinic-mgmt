<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->char('firstname', 30);
            $table->char('lastname', 30);
            $table->char('birthday', 11);
            $table->char('email', 50);

            $table->char('mobile', 15);
            $table->char('landline', 10);
            $table->char('address', 150);
            $table->integer('city');

            $table->char('mobile2', 15);
            $table->char('landline2', 10);
            $table->char('address2', 150);
            $table->integer('city2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clients');
    }
}
