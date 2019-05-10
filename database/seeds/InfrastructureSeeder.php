<?php

use Illuminate\Database\Seeder;
use App\Infrastructure;
use Carbon\Carbon;

class InfrastructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $today = Carbon::today();
        Infrastructure::insert([
            // array(
            //     'id' => 1, 
            //     'infra_name' => 'Water Tank', 
            //     'infra_abbr' => 'WTank', 
            //     'created_at' => $today, 
            //     'updated_at' => $today
            // ),
            array(
                'id' => 2, 
                'infra_name' => 'Water Canal', 
                'infra_abbr' => 'WCanal', 
                'created_at' => $today, 
                'updated_at' => $today
            ),
            // array(
            //     'id' => 3, 
            //     'infra_name' => 'Water Pump', 
            //     'infra_abbr' => 'WPump', 
            //     'created_at' => $today, 
            //     'updated_at' => $today
            // ),
            // array(
            //     'id' => 4, 
            //     'infra_name' => 'Generator Set', 
            //     'infra_abbr' => 'GenSet', 
            //     'created_at' => $today, 
            //     'updated_at' => $today
            // ),
            // array(
            //     'id' => 5, 
            //     'infra_name' => 'Farm Land', 
            //     'infra_abbr' => 'FL', 
            //     'created_at' => $today, 
            //     'updated_at' => $today
            // ),
            // array(
            //     'id' => 6, 
            //     'infra_name' => 'Drainage', 
            //     'infra_abbr' => 'Drn', 
            //     'created_at' => $today, 
            //     'updated_at' => $today
            // ),
            // array(
            //     'id' => 7, 
            //     'infra_name' => 'Building', 
            //     'infra_abbr' => 'Bldg', 
            //     'created_at' => $today, 
            //     'updated_at' => $today
            // ),
            // array(
            //     'id' => 8, 
            //     'infra_name' => 'Trees and Vegetations', 
            //     'infra_abbr' => 'T & V', 
            //     'created_at' => $today, 
            //     'updated_at' => $today
            // ),

        ]);
    }
}
