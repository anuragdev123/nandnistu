<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClickednoramalphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Clickednoramalphotos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('name');
            $table->integer('mobile_num');
            $table->integer('size');
            $table->string('other_size');
            $table->string('total_photos');
            $table->string('total_prize');
            $table->integer('advance');
            $table->integer('due');
            $table->integer('image');
            $table->integer('chnages');

            $table->rememberToken();
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
    }
}
