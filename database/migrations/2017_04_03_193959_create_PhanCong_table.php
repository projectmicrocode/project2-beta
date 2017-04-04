<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhanCongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('phancong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user_sv')->unsigned();
            $table->foreign('id_user_sv')->references('id')->on('users');
            $table->string('hotenhddn');
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
         Schema::dropIfExists('phancong');
    }
}
