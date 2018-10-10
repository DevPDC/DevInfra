<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reports\MyReport;

class ReportController extends Controller
{
    public function __contruct()
    {
        $this->middleware("guest");
    }

    public function index()
    {
        $report = new MyReport;
        $report->run();
        return view('reports.report')->withReport($report);
    }
}
