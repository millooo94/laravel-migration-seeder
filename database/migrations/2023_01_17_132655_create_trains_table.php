<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('company', 200);
            $table->string('departure_station', 100);
            $table->string('arrival_station', 100);
            $table->time('daparture_time');
            $table->time('arrival_time');
            $table->unsignedInteger('train_code');
            $table->unsignedTinyInteger('carriage_number');
            $table->boolean('in_time');
            $table->boolean('cancelled');
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
        Schema::dropIfExists('trains');
    }
}
