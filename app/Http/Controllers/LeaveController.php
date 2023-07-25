<?php

namespace App\Http\Controllers;

use App\Models\LeaveHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show emp leave management
      
        return view('employee.leave.index', ['leaves' => LeaveHistory::fetchLeaveByEmpId( auth()->user()->id)->paginate(2)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // show applay leave page
        return view('employee.leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, LeaveHistory $leavemodel)
    {
        // applying new leave
        $formFields = $request->validate([
            'leave_type' => 'required', 
            'reason' => 'required', 
            'number_of_days' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);
        $taken_leaves = ($formFields['leave_type'] == 'normal') ? auth()->user()->total_taken_leaves : auth()->user()->total_taken_festive_leaves;
        $update_leaves = ($this->eligibility($formFields['leave_type'], $taken_leaves, $formFields['number_of_days'] ));
        if(!empty($update_leaves)){
            DB::table('users')->where('id', auth()->user()->id)->update($update_leaves);
        }else
        {
            return back()->with('message', 'Failed to apply leave. please check eligibility');
        }
        $formFields['user_id'] =  auth()->user()->id;
        $formFields['emp_name'] = auth()->user()->name;
        $formFields['phone_no'] = auth()->user()->phone;
        $formFields['emp_email'] = auth()->user()->email;
        $leavemodel->create($formFields);
        return redirect()->route('leave.index')->with("message", 'Congrats! Applied for leave successfully');
    }

    /**
     * 
     * Check the leave eligibility
     * 
     * @param string $leave_type
     * @param string $column
     * @param int $days
     * @return array
     */
    public function eligibility($leave_type, $taken_leaves, $days)
    {
        if($leave_type == 'normal')
        {
            if( ($taken_leaves + $days) <= auth()->user()->total_leaves)
            {
                return [ 'total_taken_leaves' => $taken_leaves + $days ];
            }else{
                return [];
            }
        }
        if($leave_type == 'festival')
        {
            if( ($taken_leaves + $days) <= auth()->user()->total_festive_leaves)
            {
                return [ 'total_taken_festive_leaves' => $taken_leaves + $days ];
            }else{
                return [];
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave_data = DB::table('leave_history')->where('id', $id)->first();
        return view('employee.leave.edit', ['edit_data'=> $leave_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, LeaveHistory $leavemodel)
    {
        // applying new leave
        if($id != '')
        {
            $formFields = $request->validate([
                'reason' => 'required', 
                'leave_type' => 'required',
                'number_of_days' => 'required',
                'from_date' => 'required',
                'to_date' => 'required',
            ]);
            
            // $leavemodel->update($formFields);
            $previous_leave = DB::table('leave_history')->where('id', $id)->first();
            $taken_leaves = ($formFields['leave_type'] == 'normal') ? ((auth()->user()->total_taken_leaves - $previous_leave->number_of_days )) : ((auth()->user()->total_taken_festive_leaves - $previous_leave->number_of_days ));
            $update_leaves = ($this->eligibility($formFields['leave_type'], $taken_leaves, $formFields['number_of_days'] ));
            if(!empty($update_leaves)){
                DB::table('users')->where('id', auth()->user()->id)->update($update_leaves);
            }else
            {
                return back()->with('message', 'Failed to apply leave. please check eligibility');
            }
            DB::table('leave_history')->where('id', $id)->update($formFields);
            return back()->with('message', 'Congrats! leave details updated successfully');
        }
        return back()->with('message', 'Sorry! could not able to update try again letter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
