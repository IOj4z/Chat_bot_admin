<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_speakers', function (Blueprint $table) {
            $table->unsignedBigInteger('events_id');
            $table->unsignedBigInteger('speakers_id');

            $table->foreign('events_id')->references('id')->on('events');
            $table->foreign('speakers_id')->references('id')->on('speakers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_speakers');
    }
};
