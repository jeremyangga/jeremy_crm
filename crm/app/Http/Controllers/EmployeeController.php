<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     *
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('employee.login');
    }

    /**
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function login(Request $request)
     {
         $credentials = $request->validate([
             'username' => ['required', 'string'],
             'password' => ['required', 'string'],
         ]);
 
         if (Auth::attempt($credentials)) {
             return redirect()->intended('/')->with('success', 'Login successful!');
         }
 
         return back()->withErrors([
             'username' => 'Login Failed',
         ])->withInput();
    }
    /**
     * Handle the logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
