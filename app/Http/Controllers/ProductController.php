<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');
        $query = Product::query();

        if ($search) {
            $query->where('product_name', 'LIKE', '%' . $search . '%');
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('products.index', compact('user', 'products'));
    }

    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('products.create', compact('user', 'categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $rules = [
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoryID' => 'required|exists:categories,categoryID',
            'supplierID' => 'required|exists:suppliers,supplierID',
        ];

        $this->validate($request, $rules);
        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product data created successfully.');
    }

    public function show()
    {   
        //
    }

    public function edit($id)
    {
        $user = Auth::user();
        $products = Product::findOrFail($id);
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('products.edit', compact('user', 'products', 'categories', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoryID' => 'required|exists:categories,categoryID',
            'supplierID' => 'required|exists:suppliers,supplierID',
        ];

        $products = Product::findOrFail($id);
        $products->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product data has been successfully changed.');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        
        return redirect()->route('products.index')->with('success', 'Product data has been successfully deleted.');
    }

    public function printData()
    {
        $user = Auth::user(); 
        $printProduct = Product::all();
    
        return view('products.print', compact('user', 'printProduct'));
    }
}
