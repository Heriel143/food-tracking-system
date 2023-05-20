<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    //
    public function allUnits()
    {
        $units = Unit::latest()->get();
        return view('admin.unit.allUnits', compact('units'));
    }
    public function addUnit()
    {

        return view('admin.unit.addUnit');
    }
    public function storeUnit(Request $request)
    {
        Unit::insert([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Unit Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.units')->with($notification);
    }
    public function editUnit($id)
    {
        $unit = Unit::findOrFail($id);

        return view('admin.unit.editUnit', compact('unit'));
    }
    public function updateUnit(Request $request)
    {
        Unit::findOrFail($request->id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Unit Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.units')->with($notification);
    }
    public function deleteUnit($id)
    {
        Unit::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Unit deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
