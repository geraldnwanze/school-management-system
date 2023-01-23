<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_biodatas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('surname');
            $table->string('firstname');
            $table->string('othername')->nullable();
            $table->string('dob');
            $table->string('year_of_entry');
            $table->string('date_of_entry');
            $table->string('year_of_graduation');
            $table->string('current_class');
            $table->string('current_term');
            $table->string('gender');
            $table->string('nationality');
            $table->integer('state');
            $table->integer('lga');
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
        Schema::dropIfExists('student_biodatas');
    }
}
