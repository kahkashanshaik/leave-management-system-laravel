<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeMangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_name', '=', 'employee')->paginate(3);
        return view('admin.mangemps.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user_data = DB::table('users')->where('id', $id)->first();
        return view('admin.mangemps.edit',['user_data' => $user_data] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = new User();
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:12', 'max:12']
        ]);
        if(!empty($request['password']))
        {
            if(!(Hash::check($request['old_password'], Auth()->user()->password )))
            {
                return redirect()->back()->with("message", "Current Password doesn't matches with the password");
            }
            if(strcmp($request['password'], Auth()->user()->password))
            {
                return redirect()->back()->with("message", "Current Password is same as old password");
            }
        }
        if(Auth()->user()->email != $request['email'])
        {
            $user->email = $request['email'];
        }

        $user->name = $request['name'];
        $user->phone = $request['phone'];
        $user->update();

        return  redirect()->back()->with('message', 'Employee Details Updated successfully');
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
