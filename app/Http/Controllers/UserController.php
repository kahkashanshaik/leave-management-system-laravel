<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LeaveSettings;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    // Show login form
    public function login()
    {
        return view('users.login');
    }

    // show registration form
    public function create()
    {
        return view('users.register');
    }

    // create employee form
    public function store(Request $request, LeaveSettings $leaveSettings)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'phone' => ['required', 'min:12', 'max:12']
        ]);
        $formFields['total_leaves'] = $leaveSettings::find(1)->value('total_leaves');
        $formFields['total_festive_leaves'] = $leaveSettings::find(1)->value('total_festive_leaves');
        $formFields['role_name'] = 'employee';
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return  redirect('/')->with('message', 'Employee created successfully');    
    }

    // user logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'You have been logged out!');
    }

    // login user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);      

        if(auth()->attempt($formFields))
        {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'you are now Logged In');

        }
        return back()->withErrors(['message' => 'you are now Logged In'])->onlyInput('email');
    }
}
