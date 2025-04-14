<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shops = Shop::first();

        return view('shops.index', compact('user', 'shops'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['shop_name', 'address', 'phone_number', 'email']);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images'), $namaFile);
            $data['logo'] = $namaFile;
        }

        Shop::create($data);

        return redirect()->route('shops.index')->with('success', 'Store profile added successfully');
    }

    public function edit()
    {
        $user = Auth::user();
        $shops = Shop::first();

        return view('shops.edit', compact('user', 'shops'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $shop = Shop::findOrFail($id);
        
        $data = $request->only(['shop_name', 'address', 'phone_number', 'email']);

        if ($request->hasFile('logo')) {
            if ($shop->logo) {
                $oldFilePath = public_path('assets/images/' . $shop->logo);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $file = $request->file('logo');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images'), $namaFile);
            $data['logo'] = $namaFile;
        }

        $shop->update($data);

        return redirect()->route('shops.index')->with('success', 'Profile updated successfully');
    }
}
