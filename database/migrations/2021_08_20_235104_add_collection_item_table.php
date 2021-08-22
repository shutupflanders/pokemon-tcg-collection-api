<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollectionItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_items', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->integer('count')->default(0);
            $table->string('variation')->nullable();
            $table->timestamps();

            $table->unique(['card_id', 'variation'], 'card_variation');

            $table->foreign('card_id')->references('id')->on('cards');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('collection_items');
    }
}
