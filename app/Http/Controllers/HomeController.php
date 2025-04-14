<?php
namespace App\Http\Controllers;

use App\User;
use App\Sale;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {     
        $user = Auth::user();
        $users = User::all();
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
        $monthlySales = Sale::selectRaw('MONTH(sale_date) as month, YEAR(sale_date) as year, SUM(total_amount) as total')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->translatedFormat('F');
            $data[] = $monthlySales->where('month', $i)->sum('total');
        }

        return view('home', compact(
            'user', 'users', 'sales', 'lowStockProducts', 'bestsellerProducts',
            'labels', 'data'
        ));
    }
}