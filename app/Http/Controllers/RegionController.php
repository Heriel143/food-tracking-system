<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function allRegions()
    {
        $regions = Region::all();
        return view('admin.region.allRegions', compact('regions'));
    }

    public function editRegion($id)
    {
        $region = Region::findOrFail($id);
        return view('admin.region.editRegion', compact('region'));
    }

    public function updateRegion(Request $request)
    {
        Region::where('id', $request->id)->update(['name' => $request->name]);
        // $regions = Region::all();

        $notification = array(
            'message' => 'Region Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.regions')->with($notification);
    }
    public function deleteRegion($id)
    {
        Region::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Region Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.regions')->with($notification);
    }
    public function storeRegion(Request $request)
    {
        $input = $request->all();
        Region::create($input);
        $regions = Region::all();

        $notification = array(
            'message' => 'Region Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification, $regions);
        // return view('admin.region.addRegion');
    }
}
