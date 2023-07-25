<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveSettings;

class AdminController extends Controller
{
    // show settings forms
    public function create()
    {
        return view('admin.settings');
    }
    
    // create new leave settings
    public function store(Request $request, LeaveSettings $leaveSettings)
    {
        // dd($request);
       $formFields = $request->validate([
            'total_leaves' => 'required',
            'total_festive_leaves' => 'required'
       ]);
       $leaveSettings->create($formFields);
       return redirect('/')->with('message', 'Settings has been saved successfully'); 
    }
}
