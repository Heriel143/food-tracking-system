<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stockReport()
    {
        $products = Product::orderBy('name', 'asc')->get();
        return view('admin.stock.stockReport', compact('products'));
    }
    public function printStoctReport()
    {
        $products = Product::orderBy('name', 'asc')->get();
        return view('admin.stock.printStoctReport', compact('products'));
    }
    public function supplierReport()
    {
        $suppliers = Supplier::orderBy('name', 'asc')->get();
        return view('admin.stock.supplierReport', compact('suppliers'));
    }
    public function printSupplierReport(Request $request)
    {
        $products = Product::where('supplier_id', $request->supplier_id)->orderBy('name', 'asc')->get();
        return view('admin.stock.printSupplierReport', compact('products'));
    }
}
