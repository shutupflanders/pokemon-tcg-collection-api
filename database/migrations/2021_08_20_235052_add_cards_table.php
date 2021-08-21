<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('set_id');
            $table->string('card_id');
            $table->string('name');
            $table->string('number');
            $table->string('rarity');

            $table->timestamps();

            $table->index('card_id', 'card_id');

            $table->foreign('set_id')->references('id')->on('sets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cards');
    }
}
