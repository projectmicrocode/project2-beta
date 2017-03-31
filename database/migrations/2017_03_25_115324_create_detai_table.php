<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tendetai');
            $table->integer('soluong');
            $table->string('ngonngu');
            $table->string('noidungcv');
            $table->string('tienganh');
            $table->integer('tinhtrang');
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
        //
        Schema::dropIfExists('detai');
    }
}
