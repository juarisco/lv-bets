<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('number', 4);
            $table->string('series', 3)->nullable();
            $table->timestamp('published_at');

            $table->unsignedBigInteger('lottery_id');
            $table->foreign('lottery_id')->references('id')->on('lotteries');

            $table->unsignedBigInteger('time_id')->nullable();
            $table->foreign('time_id')->references('id')->on('times');

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
        Schema::dropIfExists('results');
    }
}
