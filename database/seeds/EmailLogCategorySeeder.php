<?php

use Illuminate\Database\Seeder;
use App\EmailLogCategory;

class EmailLogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EmailLogCategory::insert([
            array(
                'id' => '1',
                'email_log_name' => 'Service Completed - Notification'
            ),
            array(
                'id' => '2',
                'email_log_name' => 'On The Day - Services - Alert'
            ),
            array(
                'id' => '3',
                'email_log_name' => 'Service - Alert'
            ),
            array(
                'id' => '4',
                'email_log_name' => 'Maintenance Complete - Notification'
            ),
            array(
                'id' => '5',
                'email_log_name' => 'On The Day - Maintenance - Alert'
            ),
            array(
                'id' => '6',
                'email_log_name' => 'Maintenance - Alert'
            ),
            array(
                'id' => '7',
                'email_log_name' => 'Generator Exceeds Limit - Alert'
            ),
            array(
                'id' => '8',
                'email_log_name' => 'Generator Repaired - Notification'
            ),
        ]);
    }
}
