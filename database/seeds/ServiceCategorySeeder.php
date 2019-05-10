<?php

use Illuminate\Database\Seeder;
use App\Category;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            array(
                'id' => '1',
                'category_name' => 'Air Conditioning',
                'category_abbr' => 'AC'
            ),
            array(
                'id' => '2',
                'category_name' => 'Masonry',
                'category_abbr' => 'M'
            ),
            array(
                'id' => '3',
                'category_name' => 'Electrical',
                'category_abbr' => 'E'            
            ),
            array(
                'id' => '4',
                'category_name' => 'Painting Works',
                'category_abbr' => 'PW'            
            ),
            array(
                'id' => '5',
                'category_name' => 'Welding',
                'category_abbr' => 'W'            
            ),
            array(
                'id' => '6',
                'category_name' => 'Roofing',
                'category_abbr' => 'R'           
            ),
            array(
                'id' => '7',
                'category_name' => 'Plumbing',
                'category_abbr' => 'P'
            ),
        ]);
    }
}
