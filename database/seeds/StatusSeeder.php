<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Status::insert([
            array(
              'status_name' => 'Unfiltered',
              'status_abbr' => 'UnFltr',
            ),
            array(
              'status_name' => 'Pending',
              'status_abbr' => 'Pend',
            ),
            array(
              'status_name' => 'Received',
              'status_abbr' => 'Rec',
            ),
            array(
              'status_name' => 'Under Inspection',
              'status_abbr' => 'UnUnsp',
            ),
            array(
              'status_name' => 'Need Materials',
              'status_abbr' => 'NM',
            ),
            array(
              'status_name' => 'Rendering Service',
              'status_abbr' => 'RS',
            ),
            array(
              'status_name' => 'Paused Service',
              'status_abbr' => 'PS',
            ),
            array(
              'status_name' => 'Service Completed',
              'status_abbr' => 'PS',
            ),
            array(
              'status_name' => 'Completed & Evaluated',
              'status_abbr' => 'CNE',
            ),
          ]);
    }
}
