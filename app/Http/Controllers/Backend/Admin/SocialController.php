<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SocialController extends Controller
{
    //
    public function index(){
        $socials = Social::all();
        return view('backend.admin.social.index', compact('socials'));
    }
    public function create(){
        return view('backend.admin.social.create');
    }
    public function store(Request $request):RedirectResponse{
        $validation = $request->validate([
            'name' => 'required',
            'link' => 'required',
            'icon' => 'required'
        ]);
        $social = Social::create([
            'name' =>  $request->name,
            'link' =>  $request->link,
            'icon' =>  $request->icon
        ]);
        if($social){
            noty()->info('Social created successfully.');
        }else{
            noty()->error("Social can't create!");
        }
        return redirect()->back();
    }
    public function edit($id){
        $social = Social::where('id', $id)->first();
        return view('backend.admin.social.edit',compact('social'));
    }

    public function update(Request $request):RedirectResponse{
        $validation = $request->validate([
            'name' => 'required',
            'link' => 'required',
            'icon' => 'required'
        ]);
        $social = Social::where('id', $request->hidden_id)->first();
        $social->update([
            'name' =>  $request->name,
            'link' =>  $request->link,
            'icon' =>  $request->icon
        ]);
        if($social){
            noty()->info('Social updated successfully.');
        }else{
            noty()->error("Social can't update!");
        }
        return redirect()->back();
    }
    public function destroy($id){
        $social = Social::where('id', $request->hidden_id)->delete();
       
        if($social){
            noty()->info('Social deleted successfully.');
        }else{
            noty()->error("Social can't delete!");
        }
        return redirect()->back();
    }
}
