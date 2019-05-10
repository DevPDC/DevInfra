<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoadPointsToOcularInspectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inspections',function($table) {
            $table->integer('load_points')->after('posts_id');
            $table->timestamps()->after('proposed_schedule')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspections', function($table)
        {
            $table->dropColumn(['load_points','created_at']);
        });
    }
}
