<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('advertisements', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('Name', 90);
            $table->string('Place', 150);
            $table->string('Address', 90);
            $table->string('Superficiality', 90);
            $table->string('Fettle', 150);
            $table->string('Benefits', 150);
            $table->string('TypeAdvertise',30);
            $table->smallInteger('RoomNum');
            $table->string('TypeHouse', 30);
            $table->string('Infrastructure', 200);
            $table->float('Area');
            $table->text('About');
            $table->boolean('IsArchieved');
            $table->float('Price');
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
        Schema::dropIfExists('advertisements');
    }
}
