<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreuiController extends Controller
{
    public function getDashboard()
    {
        return view('coreui.dashboard');
    }

    public function getToastr()
    {
        return view('coreui.toast');
    }

    public function getCoreIcons()
    {
        return view('coreui.coreui-icons');
    }

    public function getAlerts()
    {
        return view('coreui.alerts');
    }

    public function getDatatable()
    {
        return view('coreui.datatable');
    }

    public function getFawesome()
    {
        return view('coreui.fontawesome');
    }

    public function getSimpleIcons()
    {
        return view('coreui.simple-icons');
    }

    public function getLoadingButtons()
    {
        return view('coreui.loading-buttons');
    }

    public function getAdvForms()
    {
        return view('coreui.advanced-forms');
    }

    public function getCalendar()
    {
        return view('coreui.calendar');
    }

    public function getBasicForms()
    {
        return view('coreui.basic-forms');
    }

    public function getCollapse()
    {
        return view('coreui.collapse');
    }

    public function getProgress()
    {
        return view('coreui.progress');
    }

    public function getListGroup()
    {
        return view('coreui.list-group');
    }
}
