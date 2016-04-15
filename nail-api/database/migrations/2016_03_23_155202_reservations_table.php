<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('nailist_id')->unsigned();
          $table->string('nail_menu');
          $table->datetime('start');
          $table->datetime('end');
          $table->timestamps();

          $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

          $table->foreign('nailist_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reservations');
    }
}
