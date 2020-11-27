<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtStudentClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_student_class', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ref_class_id')->unsigned();
            $table->integer('ref_student_id')->unsigned();
            $table->timestamps();
            // $table->datetime('create_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('ref_class_id')->references('id')->on('t_class')->onDelete('restrict');
            $table->foreign('ref_student_id')->references('id')->on('t_student')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('at_student_class');
    }
}