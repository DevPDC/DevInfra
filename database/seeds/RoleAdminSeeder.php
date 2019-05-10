<?php

use Illuminate\Database\Seeder;
use App\RoleUser;

class RoleAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleUser::insert([
            // array(
            //     'id' => 1,
            //     'role_id' => 1000,
            //     'user_id' => 1
            // ),
            // array(
            //     'id' => 2,
            //     'role_id' => 1,
            //     'user_id' => 2
            // ),
            // array(
            //     'id' => 3,
            //     'role_id' => 1,
            //     'user_id' => 3
            // ),
            // array(
            //     'id' => 4,
            //     'role_id' => 1,
            //     'user_id' => 4
            // ),
            array(
                'id' => 5,
                'role_id' => 1,
                'user_id' => 5
            )
        ]);
    }
}
