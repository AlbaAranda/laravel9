<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_students', function (Blueprint $table) {
            $table->id();
            //students
                $table->unsignedBigInteger('student_id'); //se crea el campo, se pone el nombre de la tabla y el nombre del dato
                $table->foreign('student_id')->references('id')->on('students');//crea el enlace de la clave foranea
                //courses
                $table->unsignedBigInteger('course_id');
                $table->foreign('course_id')->references('id')->on('courses');
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
        Schema::dropIfExists('courses_students');
    }
};
