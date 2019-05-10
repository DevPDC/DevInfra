<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilitiesMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities_maintenance',function(Blueprint $table) {
            $table->increments('id');
            $table->integer('facility_id')->unsigned();
            $table->foreign('facility_id')->references('id')->on('facilities');
            $table->integer('schedule_category_id')->unsigned();
            $table->foreign('schedule_category_id')->references('id')->on('lib_schedule_categories')->onDelete('cascade');
            $table->integer('maintenance_status_id')->unsigned();
            $table->foreign('maintenance_status_id')->references('id')->on('lib_maintenance_status')->onDelete('restrict');
            $table->string('maintenance_schedule');
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
        Schema::dropIfExists('facilities_maintenance');
    }
}
