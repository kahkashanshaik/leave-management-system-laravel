<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveSettings;

class HomeController extends Controller
{

    // dashbaord page
    public static function dashboard()
    {
        if(!auth()->user())
        {
            return view('users.login');
        }
        if(auth()->user()->role_name == 'admin')
        {
            return view('admin.index');
        }
        if(auth()->user()->role_name == 'employee')
        {
            return view('employee.index',  ['dashcounts' => HomeController::emp_dashboard_count() ]);
        }
    }

    public static function emp_dashboard_count()
    {
        $leave_settings_obj = new LeaveSettings();
        $leave_settings = $leave_settings_obj::all()->first();
        $dashboard_count = [
            [
                "title" => 'Total Leaves',
                'totcount' => $leave_settings->total_leaves
            ],
            [
                "title" => 'Total Festival Leaves',
                'totcount' => $leave_settings->total_festive_leaves
            ],
            [
                "title" => 'Total Taken Leaves',
                'totcount' => auth()->user()->total_taken_leaves
            ],
            [
                "title" => 'Total Taken Festival Leaves',
                'totcount' => auth()->user()->total_taken_festive_leaves
            ]
        ];
        return $dashboard_count;
    }

}
