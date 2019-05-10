<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            array(
                'id' => '1',
                'name' => 'Administrator',
                'description' => 'UnFltr',
            ),
            array(
                'id' => '2',
                'name' => 'Authorized User 1',
                'description' => 'UnFltr',
            ),
            array(
                'id' => '3',
                'name' => 'Authorized User 2',
                'description' => 'UnFltr',
            ),
            array(
                'id' => '4',
                'name' => 'Technician',
                'description' => 'UnFltr',
            ),
            array(
                'id' => '5',
                'name' => 'Division Head',
                'description' => 'UnFltr',
            ),
            array(
                'id' => '6',
                'name' => 'Administrative Assistant',
                'description' => 'UnFltr',
            ),
            array(
                'id' => '7',
                'name' => 'Client',
                'description' => 'UnFltr',
            ),
            array(
                'id'   => '1000',
                'name' => 'Super Administrator',
                'description' => 'UnFltr',
            ),
        ]);
    }
}
