<?php

use Illuminate\Database\Seeder;
use App\LogStatus;

class LogStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    

    public function run()
    {
        LogStatus::insert([
            array(
                'id' => '1',
                'name' => 'Submitted'
            ),
            array(
                'id' => '2',
                'name' => 'Filtered'
            ),
            array(
                'id' => '3',
                'name' => 'Received'
            ),
            array(
                'id' => '4',
                'name' => 'Ongoing Inspection'
            ),
            array(
                'id' => '5',
                'name' => 'Ocular Inspection Completed'
            ),
            array(
                'id' => '6',
                'name' => 'Inspection Findings Inserted'
            ),
            array(
                'id' => '7',
                'name' => 'Service Started'
            ),
            array(
                'id' => '8',
                'name' => 'Service Paused'
            ),
            array(
                'id' => '9',
                'name' => 'Service Continued'
            ),
            array(
                'id' => '10',
                'name' => 'Completed'
            ),
            array(
                'id' => '11',
                'name' => 'Evaluated'
            ),
        ]);
    }
}
