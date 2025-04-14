<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $sales = Sale::all();
        $lowStockProducts = Product::where('stock', '<=', 5)->get();
        $bestsellerProducts = Product::select(
            'products.productID',
            'products.product_name',
            'products.price',
            'products.stock',
            'products.categoryID',
            'products.supplierID',
            DB::raw('COALESCE(SUM(sale_details.quantity), 0) as total_sold')
        )
        ->leftJoin('sale_details', 'sale_details.productID', '=', 'products.productID')
        ->groupBy(
            'products.productID',
            'products.product_name',
            'products.price',
            'products.stock',
            'products.categoryID',
            'products.supplierID'
        )
        ->having('total_sold', '>=', 5)
        ->orderByDesc('total_sold')
        ->get();

        return view('homeUser', compact('user', 'sales', 'lowStockProducts', 'bestsellerProducts'));
    }
}