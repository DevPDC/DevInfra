<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerForTicketPrefix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $date = date('y-m');

        // DB::unprepared('CREATE TRIGGER tg_table1_insert
        // BEFORE INSERT ON ticketed_requests
        // FOR EACH ROW
        // BEGIN
        // INSERT INTO table1_seq VALUES (NULL);
        // SET NEW.ticket_no = CONCAT('RMF-$date', LPAD(LAST_INSERT_ID(), 9, '0'));
        // END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
