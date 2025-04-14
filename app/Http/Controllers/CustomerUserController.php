<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerUserController extends Controller
{
    public function customerIndex(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search'); 
        $query = Customer::query();

        if ($search) { 
            $query->where('customer_name', 'LIKE', '%' . $search . '%'); 
        }

        $customers = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('customerUser.index', compact('user', 'customers'));
    }

    public function customerCreate()
    {
        $user = Auth::user();

        return view('customerUser.create', compact('user'));
    }

    public function customerStore(Request $request)
    {
        $rules = [
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
            'email' => 'required|string|email|unique:users,email',
        ];

        $this->validate($request, $rules);
        Customer::create($request->all());

        return redirect()->route('customerUser.index')->with('success', 'Customer data created successfully.');
    }
}
