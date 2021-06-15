<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Images extends Migration
{

    public function up()
    {
        Schema::dropIfExists('images');
        Schema::create('images', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedBigInteger('adv_id');
            $table->foreign('adv_id')->references('id')->on('advertisements');
            $table->string("path");
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('images');
    }
}
