<?php

namespace App\Http\Controllers\Backend\Admin;

use Illuminate\Http\Request;
use App\Models\Bannercategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class BannercategoryController extends Controller
{
    //
    public function create(){
        return view('backend.admin.banner.create-category');
    }

    public function store(Request $request):RedirectResponse{
        $validation = $request->validate([
            'name' => 'required'
        ]);

        $counter = Bannercategory::count();
        $banner_category = Bannercategory::create([
            'name' => $request->name,
            'slug' => str_replace('_', ' ', strtolower($request->name))."-".$counter+1,
            'status' => $request->status
        ]);
        if($banner_category){
            noty()->info('Banner Category updated successfully.');
        }else{
            noty()->error("Banner Category can't update!");
        }
        return redirect()->back();
    }

    public function edit($id){
        $banner_category = Bannercategory::where('id',$id)->first();
        return view('backend.admin.banner.edit-category',compact('banner_category'));
    }

    public function update(Request $request):RedirectResponse{
        $validation = $request->validate([
            'name' => 'required'
        ]);

        $banner_category = Bannercategory::where('id',$request->hidden_id)->first();
        $banner_category->update([
            'name' => $request->name,
            'slug' => str_replace('_', ' ', strtolower($request->name))."-".$request->hidden_id,
            'status' => $request->status
        ]);
        if($banner_category){
            noty()->info('Banner Category updated successfully.');
        }else{
            noty()->error("Banner Category can't update!");
        }
        return redirect()->back();
    }

    public function destroy($id){
        $banner_category = Bannercategory::where('id',$id)->delete();
        if($banner_category){
            noty()->info('Banner Category deleted successfully.');
        }else{
            noty()->error("Banner Category can't delete!");
        }
        return redirect()->back();
    }

    public function status(Request $request){
        $banner =  Bannercategory::where('id', $request->hidden_id)->first();
        $banner->update([
            'status' => $request->status,
        ]);
        if($banner){
            noty()->info('Banner updated successfully.');
        }else{
            noty()->error("Banner can't update!");
        }
        return redirect()->back();
    }
}
