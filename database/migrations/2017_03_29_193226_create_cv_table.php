<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cv', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten');
            $table->string('mssv');
            $table->string('lop');
             $table->string('diachi');
            $table->string('kinang');
            $table->string('kinangmem');
            $table->string('ngoaingu');

            
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            
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
        Schema::dropIfExists('cv');
    }
}
