<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search'); 
        $query = Category::query();

        if ($search) { 
            $query->where('category_name', 'LIKE', '%' . $search . '%'); 
        }

        $categories = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('categories.index', compact('user', 'categories'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('categories.create', compact('user'));
    }

    public function store(Request $request)
    {
        $rules = [
            'category_name' => 'required|string|max:255',
        ];

        $this->validate($request, $rules);
        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category data created successfully.');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $user = Auth::user();
        $categories = Category::findOrFail($id);

        return view('categories.edit', compact('user', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'category_name' => 'required|string|max:255',
        ];

        $this->validate($request, $rules);
        $categories = Category::findOrFail($id);
        $categories->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category data has been successfully changed.');
    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        
        return redirect()->route('categories.index')->with('success', 'Category data has been successfully deleted.');
    }

    public function printData()
    {
        $user = Auth::user(); 
        $printCategory = Category::all();
    
        return view('categories.print', compact('user', 'printCategory'));
    }
}
