<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search'); 
        $query = Supplier::query();

        if ($search) { 
            $query->where('supplier_name', 'LIKE', '%' . $search . '%'); 
        }

        $suppliers = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('suppliers.index', compact('user', 'suppliers'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('suppliers.create', compact('user'));
    }

    public function store(Request $request)
    {
        $rules = [
            'supplier_name' => 'required|string|max:255',
        ];

        $this->validate($request, $rules);
        Supplier::create($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier data created successfully.');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $user = Auth::user();
        $suppliers = Supplier::findOrFail($id);

        return view('suppliers.edit', compact('user', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'supplier_name' => 'required|string|max:255',
        ];

        $this->validate($request, $rules);
        $suppliers = Supplier::findOrFail($id);
        $suppliers->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier data has been successfully changed.');
    }

    public function destroy($id)
    {
        $suppliers = Supplier::findOrFail($id);
        $suppliers->delete();
        
        return redirect()->route('suppliers.index')->with('success', 'Supplier data has been successfully deleted.');
    }

    public function printData()
    {
        $user = Auth::user(); 
        $printSupplier = Supplier::all();
    
        return view('suppliers.print', compact('user', 'printSupplier'));
    }
}
