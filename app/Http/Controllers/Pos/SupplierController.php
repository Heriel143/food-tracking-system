<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function allSuppliers()
    {
        // $suppliers = Supplier::all();
        $suppliers = Supplier::where('region_id', Auth::user()->region_id)->get();
        return view('admin.supplier.allSuppliers', compact('suppliers'));
    }
    public function addSupplier()
    {
        return view('admin.supplier.addSupplier');
    }
    public function editSupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.supplier.editSupplier', compact('supplier'));
    }

    public function storeSupplier(Request $request)
    {
        Supplier::insert([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'region_id' => Auth::user()->region_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Supplier Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.suppliers')->with($notification);
    }
    public function updateSupplier(Request $request)
    {
        Supplier::findOrFail($request->id)->update([
            'name' => $request->name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Supplier Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.suppliers')->with($notification);
    }
    public function deleteSupplier($id)
    {
        Supplier::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Supplier Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
