<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('photo')->default('default.png');
            $table->integer('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('dob');
            $table->string('gender');
            $table->string('blood')->nullable();
            $table->string('nationality');
            $table->string('f_name');
            $table->string('f_occupation')->nullable();
            $table->integer('f_phone')->nullable();
            $table->string('m_name');
            $table->integer('m_phone')->nullable();
            $table->string('m_occupation')->nullable();
            $table->string('present_address');
            $table->string('permanent_address');
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
