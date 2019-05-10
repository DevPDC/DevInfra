<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGensetOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genset_operations', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('genset_id')->unsigned();
            $table->dateTime('date_of_operation_start')->nullable();
            $table->dateTime('date_of_operation_end')->nullable();
            $table->float('hours_operated', 4, 2);
            $table->tinyInteger('is_active');
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
        Schema::dropIfExists('genset_operations');
    }
}
