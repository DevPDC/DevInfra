<?php

use Illuminate\Database\Seeder;
use App\ScheduleCategory;

class ScheduleCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScheduleCategory::insert([
            [
                'id' => '1',
                'schedule_category' => 'Emergency',
                'schedule_category_value' => 12
            ],
            [
                'id' => '2',
                'schedule_category' => 'Quarterly',
                'schedule_category_value' => 4
            ],
            [
                'id' => '3',
                'schedule_category' => 'Biannually',
                'schedule_category_value' => 2
            ],
            [
                'id' => '4',
                'schedule_category' => 'Annually',
                'schedule_category_value' => 1
            ],
            [
                'id' => '5',
                'schedule_category' => 'Irregular',
                'schedule_category_value' => 1
            ]
        ]);
    }
}
