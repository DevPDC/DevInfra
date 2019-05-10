<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        
        User::insert([
            // array(
            //     'id' => '1',
            //     'user_idno' => '17-0811',
            //     'username' => 'pdcumayao',
            //     'password' => '$2y$10$jMB3gqAwBaWTeJr7xCEPmuKzO8RFtYTW9m2AGOtzwsO7M73ne8bW2',
            //     'last_login' => '2018-09-04 06:25:58',
            //     'created_by' => '1000',
            //     'is_active' => 1,
            //     'created_at' => '2018-09-03 22:25:58',
            //     'updated_at' => '2018-09-03 22:25:58'
            // )
            // array(
            //     'id' => '3',
            //     'user_idno' => '10-0403',
            //     'username' => '10-0403',
            //     'password' => '$2y$10$jMB3gqAwBaWTeJr7xCEPmuKzO8RFtYTW9m2AGOtzwsO7M73ne8bW2',
            //     'last_login' => '2018-09-04 06:25:58',
            //     'created_by' => '1000',
            //     'is_active' => 1,
            //     'created_at' => '2018-09-03 22:25:58',
            //     'updated_at' => '2018-09-03 22:25:58'
            // ),
            // array(
            //     'id' => '4',
            //     'user_idno' => '16-0216',
            //     'username' => '16-0216',
            //     'password' => '$2y$10$jMB3gqAwBaWTeJr7xCEPmuKzO8RFtYTW9m2AGOtzwsO7M73ne8bW2',
            //     'last_login' => '2018-09-04 06:25:58',
            //     'created_by' => '1000',
            //     'is_active' => 1,
            //     'created_at' => '2018-09-03 22:25:58',
            //     'updated_at' => '2018-09-03 22:25:58'
            // ),
            array(
                'id' => '5',
                'user_idno' => '17-0507',
                'username' => '17-0507',
                'password' => '$2y$10$jMB3gqAwBaWTeJr7xCEPmuKzO8RFtYTW9m2AGOtzwsO7M73ne8bW2',
                'last_login' => '2018-09-04 06:25:58',
                'created_by' => '1000',
                'is_active' => 1,
                'created_at' => '2018-09-03 22:25:58',
                'updated_at' => '2018-09-03 22:25:58'
            )
        ]);
    }
}
