<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_logs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('posts_id')->unsigned();
            $table->foreign('posts_id')->references('id')->on('service_requests')->onDelete('cascade');
            $table->integer('logstatus_id')->unsigned();
            $table->foreign('logstatus_id')->references('id')->on('lib_log_status');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_logs');
    }
}
