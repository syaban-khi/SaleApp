<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search'); 
        $query = Customer::query();

        if ($search) { 
            $query->where('customer_name', 'LIKE', '%' . $search . '%'); 
        }

        $customers = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('customers.index', compact('user', 'customers'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('customers.create', compact('user'));
    }

    public function store(Request $request)
    {
        $rules = [
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
            'email' => 'required|string|email|unique:users,email',
        ];

        $this->validate($request, $rules);
        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer data created successfully.');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $user = Auth::user();
        $customers = Customer::findOrFail($id);

        return view('customers.edit', compact('user', 'customers'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
            'email' => 'required|string|email|unique:users,email',
        ];

        $this->validate($request, $rules);
        $customers = Customer::findOrFail($id);
        $customers->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer data has been successfully changed.');
    }

    public function destroy($id)
    {
        $customers = Customer::findOrFail($id);
        $customers->delete();
        
        return redirect()->route('customers.index')->with('success', 'Customer data has been successfully deleted.');
    }

    public function printData()
    {
        $user = Auth::user(); 
        $printCustomer = Customer::all();
    
        return view('customers.print', compact('user', 'printCustomer'));
    }
}
