<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('service_requests')->onDelete('cascade');
            $table->char('user_id',7)->nullable();
            $table->integer('timeliness')->unsigned();
            $table->foreign('timeliness')->references('id')->on('lib_ratings')->onDelete('restrict');
            $table->integer('service_quality')->unsigned();
            $table->foreign('service_quality')->references('id')->on('lib_ratings')->onDelete('restrict');
            $table->integer('service_courtesy')->unsigned();
            $table->foreign('service_courtesy')->references('id')->on('lib_ratings')->onDelete('restrict');
            $table->string('evaluation_title')->nullable();
            $table->text('evaluation_body')->nullable();
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
        Schema::dropIfExists('evaluations');
    }
}
