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
        Schema::create('event_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('events_id')->nullable();
            $table->unsignedBigInteger('members_id')->nullable();
            $table->integer('in_person')->default(0);
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');;
            $table->foreign('members_id')->references('id')->on('members')->onDelete('cascade');;
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
        Schema::dropIfExists('event_members');
    }
};
