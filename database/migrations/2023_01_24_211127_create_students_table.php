<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('reg_no')->nullable();
            $table->string('surname');
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('gender');
            $table->string('phone_number')->nullable();
            $table->string('nationality');
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedBigInteger('lga_id');
            $table->foreign('lga_id')->references('id')->on('l_g_a_s');
            $table->string('dob');
            $table->string('date_of_entry')->nullable();
            $table->string('year_of_entry')->nullable();
            $table->string('year_of_graduation')->nullable();
            $table->unsignedBigInteger('class_room_id');
            $table->foreign('class_room_id')->references('id')->on('class_rooms');
            $table->string('current_term')->nullable();
            $table->string('current_session')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('students');
    }
}
