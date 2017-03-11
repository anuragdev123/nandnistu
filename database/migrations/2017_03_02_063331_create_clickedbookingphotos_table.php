<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClickedbookingphotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Clickedbookingphotos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            // $table->string('image');
            $table->integer('phone_num');
            $table->date('booking_date');
            $table->date('function_date');
            $table->string('occation');
            $table->string('size');
            $table->integer('total_rate');
            $table->integer('advance');
            $table->integer('due');

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
         Schema::dropIfExists('Clickedbookingphotos');
    }
}
