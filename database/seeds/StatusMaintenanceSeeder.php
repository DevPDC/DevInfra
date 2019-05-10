<?php

use Illuminate\Database\Seeder;
use App\MaintenanceStatus;

class StatusMaintenanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MaintenanceStatus::insert([
            [
                'id' => '1',
                'status_name' => 'Not Yet Performed'
            ],
            [
                'id' => '2',
                'status_name' => 'Under Maintenance'
            ],
            [
                'id' => '3',
                'status_name' => 'Accomplished'
            ],
            [
                'id' => '4',
                'status_name' => 'Exceeds Limit'
            ],
        ]);
    }
}
