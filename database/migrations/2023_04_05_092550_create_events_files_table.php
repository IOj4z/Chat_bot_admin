<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('events_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('events_id');
            $table->unsignedBigInteger('files_id');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade');;
            $table->foreign('files_id')->references('id')->on('files')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events_files');
    }
};
