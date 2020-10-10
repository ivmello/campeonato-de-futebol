<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->datetime('star_date');
            $table->datetime('end_date');

            $table->unsignedBigInteger('team_a_id');
            $table->foreign('team_a_id')->references('id')->on('teams')->onDelete('cascade');

            $table->unsignedBigInteger('team_b_id');
            $table->foreign('team_b_id')->references('id')->on('teams')->onDelete('cascade');

            $table->integer('score_team_a');
            $table->integer('score_team_b');
            $table->boolean('tie')->default(0);
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
        Schema::dropIfExists('games');
    }
}
