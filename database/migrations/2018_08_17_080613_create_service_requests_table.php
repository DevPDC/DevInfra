<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function(Blueprint $table){

            $table->increments('id');
            $table->char('user_id', 7)->nullable();
            $table->char('emp_idno', 7)->nullable();
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('lib_status')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('lib_categories')->onDelete('cascade');
            $table->string('request_details');
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
        Schema::dropIfExists('service_requests');
    }
}
