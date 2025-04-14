<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Sale;
use App\Product;
use App\Customer;
use App\SaleDetail;
use App\Mail\ReceiptMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Sale::query();

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('saleID', 'like', '%' . $searchTerm . '%')
                ->orWhere('sale_date', 'like', '%' . $searchTerm . '%');
        }

        $sales = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('sales.index', compact('user', 'sales'));
    }

    public function create()
    {
        $user = Auth::user();
        $customers = Customer::all();
        $products = Product::all();

        return view('sales.create', compact('user', 'customers', 'products'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'sale_date' => 'required|date',
            'customerID' => 'nullable|exists:customers,customerID',
            'cashier_name' => 'required|string|max:255',
            'total_amount' => 'required|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'change' => 'required|numeric|min:0',
            'sale_details' => 'required|array',
            'sale_details.*.productID' => 'required|exists:products,productID',
            'sale_details.*.quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->paid_amount < $request->total_amount) {
            return back()->with('error', 'The amount paid cannot be less than the total amount.');
        }

        DB::beginTransaction();
        try {
            $sale = Sale::create([
                'sale_date' => $request->sale_date,
                'customerID' => $request->customerID ?? null,
                'cashier_name' => $user->name,
                'total_amount' => $request->total_amount,
                'paid_amount' => $request->paid_amount,
                'change' => $request->change,
            ]);

            foreach ($request->sale_details as $detail) {
                $product = Product::findOrFail($detail['productID']);

                if ($product->stock < $detail['quantity']) {
                    return back()->with('error', 'Product stock ' . $product->name . ' not enough.');
                }

                $product->decrement('stock', $detail['quantity']);

                SaleDetail::create([
                    'saleID' => $sale->saleID,
                    'productID' => $detail['productID'],
                    'quantity' => $detail['quantity'],
                ]);
            }

            DB::commit();

            if ($sale->customer && $sale->customer->email) {
                Mail::to($sale->customer->email)->send(new ReceiptMail($sale));
            }

            return redirect()->route('sales.show', $sale->saleID)
                ->with('success', 'Transaction saved successfully.');

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('An error occurred while saving the sales transaction: ' . $e->getMessage());

            return back()->with('error', 'An error occurred while saving the transaction: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $user = Auth::user();
        $shop = Shop::first();
        $sale = Sale::with('saleDetail.product', 'customer')->findOrFail($id);

        return view('sales.show', compact('user', 'shop', 'sale'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();

        DB::beginTransaction();
        try {
            $sale = Sale::findOrFail($id);

            foreach ($sale->saleDetail as $detail) {
                $product = Product::find($detail->productID);
                if ($product) {
                    $product->increment('stock', $detail->quantity);
                }
            }

            SaleDetail::where('saleID', $id)->delete();
            $sale->delete();

            DB::commit();

            return redirect()->route('sales.index')->with('success', 'Transaksi berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollback();
        }

        return redirect()->route('sales.index')->with('success', 'Sale data has been successfully deleted.');
    }

    public function printData()
    {
        $user = Auth::user(); 
        $printSale = Sale::all();
        
        return view('sales.print', compact('user', 'printSale'));
    }
}
