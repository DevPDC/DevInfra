<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreaateGensetCapacityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genset_capacity', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('genset_facility_id')->unsigned();
            $table->foreign('genset_facility_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->integer('capacity_max')->unsigned();
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
        Schema::dropIfExists('genset_capacity');
    }
}
