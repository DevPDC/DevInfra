<?php

namespace App\Http\Controllers;

use App\Alert;
use Illuminate\Http\Request;
use DateTime;

class AlertController extends Controller
{
    public function alertByIconMaintenance(Request $request)
    {
        
        switch(factype) {
            case 1:
                layer.setIcon(waterTank);
                break;
            case 4:
                layer.setIcon(generator);
                break;
            case 7:
                layer.setIcon(building);
                break;
            case 8:
                layer.setIcon(trees);
        } 
    }
}
