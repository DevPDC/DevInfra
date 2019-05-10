<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_tickets', function(Blueprint $table){
            $table->increments('id');
            $table->integer('request_id')->unsigned()->unique();
            $table->string('ticket_prefix');
            $table->integer('ticket_series')->unsigned();
            $table->string('ticket_full');
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
        Schema::dropIfExists('request_tickets');
    }
}
