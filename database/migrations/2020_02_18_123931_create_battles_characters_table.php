<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBattlesCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battles_characters', function (Blueprint $table) {
            $table->bigInteger('battle_id')->unsigned();
            $table->foreign('battle_id')->references('id')->on('battles')->onDelete('cascade');
            $table->bigInteger('character_id')->unsigned();
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('battle_character');
    }
}
