<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function lead(){
        $customers = Customer::with('employee', 'product')->get();
        return view('customer.lead', compact('customers'));
    }

    public function subscribed(){
        $customers = Customer::with('employee', 'product')->where('isSubscribed', true)->get();

        return view('customer.subscribed', compact('customers'));
    }
}
