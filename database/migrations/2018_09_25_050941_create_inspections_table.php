<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('posts_id')->unsigned();
            $table->foreign('posts_id')->references('id')->on('service_requests')->onDelete('cascade');
            $table->text('details');
            $table->text('recommendation');
            $table->string('proposed_schedule');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inspections');
    }
}
