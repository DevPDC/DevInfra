<?php

use Illuminate\Database\Seeder;
use App\FacilityProperty;
use App\Property;

class SeederFacilityPropertiesCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::insert([
            [
                'id' => '1',
                'property_category_name' => 'Model',
                'property_category_abbr' => 'Mo'
            ],
            [
                'id' => '2',
                'property_category_name' => 'Engine Model',
                'property_category_abbr' => 'EngMo'
            ],
            [
                'id' => '3',
                'property_category_name' => 'Engine Number',
                'property_category_abbr' => 'EngNo'
            ],
            [
                'id' => '4',
                'property_category_name' => 'Cylinder',
                'property_category_abbr' => 'C'
            ],
            [
                'id' => '5',
                'property_category_name' => 'Volume',
                'property_category_abbr' => 'L'
            ],
            [
                'id' => '6',
                'property_category_name' => 'Weight',
                'property_category_abbr' => 'Wt'
            ],
            [
                'id' => '7',
                'property_category_name' => 'Frame Dimension (LxWxH)',
                'property_category_abbr' => 'FrmDms'
            ]
        ]);
    }
}
