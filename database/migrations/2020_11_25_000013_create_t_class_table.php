<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_class', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('major');
            $table->timestamps();
            // $table->datetime('create_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            // $table->timestamp('modify_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_class');
    }
}