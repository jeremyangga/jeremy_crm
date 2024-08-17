<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function lead(){
        $customers = Customer::with('employee', 'product')
        ->where('isSubscribed', false)
        ->orderBy('updated_at', 'asc')
        ->get();
        return view('customer.lead', compact('customers'));
    }

    public function subscribed(){
        $customers = Customer::with('employee', 'product')->where('isSubscribed', true)->get();

        return view('customer.subscribed', compact('customers'));
    }

    public function create(){
        $products = Product::all();
        return view('employee.newcustomer', compact('products'));
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'idProduct' => 'required|exists:products,id',
        ]);
        $validatedData['idEmployee'] = Auth::id();
        $validatedData['isApproved'] = false; 
        $validatedData['isSubscribed'] = false;
        Customer::create($validatedData);   
        return redirect('/')->with('success', 'Customer added successfully!');
    }
}
