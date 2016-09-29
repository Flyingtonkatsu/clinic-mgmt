<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->char('client_fname', 30);
            $table->char('client_lname', 30);
            $table->char('patient_name', 20);

            $table->boolean('edited');   // for use with registering new clients
            $table->boolean('client_verified'); // TRUE if registered user has been verified with Client records
            $table->boolean('patient_verified'); // TRUE if patient has been verified with existing or new Patient record

            $table->char('purpose', 20);
            $table->char('weight', 7);

            $table->integer('vet_id');     // foreign key for entry in employees table
            $table->integer('client_id');  // foreign key for entry in clients table
            $table->integer('patient_id'); // foreign key for entry in patients table
            
            $table->char('room', 2);
            $table->char('status', 15); // For tracking patient progress: [Registered, Verified, Consultation, Treated, Confined, Completed]
        });
    }

    public function down()
    {
        Schema::drop('registrations');
    }
}
