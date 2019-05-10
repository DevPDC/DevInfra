<?php

use Illuminate\Database\Seeder;
use App\Rate;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rate::insert([
            array(
                'id' => '1',
                'rating_name' => 'Poor Service'
            ),
            array(
                'id' => '2',
                'rating_name' => 'Needs Improvement'
            ),
            array(
                'id' => '3',
                'rating_name' => 'Satisfactory'
            ),
            array(
                'id' => '4',
                'rating_name' => 'Very Satisfactory'
            ),
            array(
                'id' => '5',
                'rating_name' => 'Excellent Service'
            )
        ]);
    }
}
