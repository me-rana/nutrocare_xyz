<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\CustomPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CustompageController extends Controller
{
    //
    public function index(){
        $custom_pages = CustomPage::all();
        return view('backend.admin.custom-page.index', compact('custom_pages'));
    }
    public function create(){
        return view('backend.admin.custom-page.create');
    }
    public function store(Request $request):RedirectResponse{
        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $counter = CustomPage::count();
        $custom_page = CustomPage::create([
            'name' => $request->name,
            'slug' => str_replace('_', ' ', strtolower($request->name))."-".$counter+1,
            'description' => $request->description,
            'status' => $request->status
        ]);

        if($custom_page){
            noty()->info('Custom page successfully.');
        }else{
            noty()->error("Custom page can't create!");
        }
        return redirect()->back();
    }

    public function edit($id){
        $custom_page = CustomPage::where('id',$id)->first();
        return view('backend.admin.custom-page.edit',compact('custom_page'));
    }
    public function update(Request $request):RedirectResponse{
        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $custom_page = CustomPage::where('id',$request->hidden_id)->first();
        $custom_page->update([
            'name' => $request->name,
            'slug' => str_replace('_', ' ', strtolower($request->name))."-".$counter+1,
            'description' => $request->description,
            'status' => $request->status
        ]);

        if($custom_page){
            noty()->info('Custom page updated successfully.');
        }else{
            noty()->error("Custom page can't update!");
        }
        return redirect()->back();
    }

    public function destroy($id){
        $custom_page = CustomPage::where('id', $id)->delete();
        if($custom_page){
            noty()->info('Custompage deleted successfully.');
        }else{
            noty()->error("Custompage can't delete!");
        }
        return redirect()->back();
    }
    public function status(Request $request){
        $custom_page =  CustomPage::where('id', $request->hidden_id)->first();
        $custom_page->update([
            'status' => $request->status,
        ]);
        if($custom_page){
            noty()->info('Custom page updated successfully.');
        }else{
            noty()->error("Custom page can't update!");
        }
        return redirect()->back();
    }
}
