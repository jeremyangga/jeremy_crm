<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Customer;
use App\Models\Product;
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

    public function myCustomer(){
        $employee = Auth::user();
        $customers = $employee->customers()->with('product')->get();
        return view('customer.mycustomer', compact('customers'));
    }

    public function project(){
        $employee = Auth::user();
        return view('employee.project', compact('employee'));
    }

    public function approvalPage(){
        if(!Auth::user()->isManager) {
            return redirect('/')->with('error', 'Access Denied');
        }
        $customers = Customer::where('isApproved', false)->get();
        return view('employee.approval', compact('customers'));
    }

    public function approveCustomer($id){
        if(!Auth::user()->isManager) {
            return redirect('/')->with('error', 'Access Denied');
        }

        $customer = Customer::find($id);
        if($customer) {
            $customer->isApproved = true;
            $customer->save();
            return redirect('/')->with('success', 'Customer is approved');
        }
    }

    public function subscribePage(){
        $employee = Auth::user();
        $customers = $employee->customers()->with('product')->where('isSubscribed', false)->get();
        $products = Product::all();
        return view('employee.subscribe', compact('customers', 'products'));
    }

    public function subscribeCustomer(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'isApproved' => 'required|boolean',
            'isSubscribed' => 'required|boolean',
            'idProduct' => 'required|exists:products,id',
        ]);
        $customer = Customer::find($id);
        $customer->update($validatedData);
        return redirect()->route('customer.mycustomer')->with('success', 'Customer updated successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
