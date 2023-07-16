<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function allCategories()
    {
        $categories = Category::where('region_id', Auth::user()->region_id)->get();
        return view('admin.category.allCategories', compact('categories'));
    }
    public function addCategory()
    {

        return view('admin.category.addCategory');
    }
    public function storeCategory(Request $request)
    {
        Category::insert([
            'name' => $request->name,
            'region_id' => Auth::user()->region_id,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.categories')->with($notification);
    }
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.editCategory', compact('category'));
    }
    public function updateCategory(Request $request)
    {
        Category::findOrFail($request->id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.categories')->with($notification);
    }
    public function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
