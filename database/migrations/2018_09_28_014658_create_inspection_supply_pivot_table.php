<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionSupplyPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_supply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inspection_id')->unsigned()->index();
            $table->foreign('inspection_id')->references('id')->on('inspections')->onDelete('cascade');
            $table->integer('supply_id')->unsigned()->index();
            $table->foreign('supply_id')->references('id')->on('supplies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inspection_supply');
    }
}
