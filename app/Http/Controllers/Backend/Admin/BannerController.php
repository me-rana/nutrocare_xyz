<?php

namespace App\Http\Controllers\Backend\Admin;

use File;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\Bannercategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BannerController extends Controller
{
    //
    public function index(){
        $banner_categories = Bannercategory::get();
        $banners = Banner::get();
        return view('backend.admin.banner.index', compact('banner_categories','banners'));
    }
    public function create(){
        $banner_categories = Bannercategory::get();
        return view('backend.admin.banner.create', compact('banner_categories'));
    }
    public function store(Request $request):RedirectResponse{
        $validation = $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,png,webp,jpeg,gif',
        ]);
        $request_image = $request->file('image');
        if(!is_null($request_image)){
            $image_gen = hexdec(uniqid()) . '.' .$request_image->getClientOriginalExtension();
            $request_image->move(public_path('assets/images/banner'), $image_gen);
            $image = 'assets/images/banner/'.$image_gen;
        }

        $banner = Banner::create([
            'name' => $request->name,
            'link' => $request->link,
            'banner_category_id' => $request->banner_category_id,
            'image' => $image,
            'status' =>  $request->status,
        ]);
        if($banner){
            noty()->info('Banner created successfully.');
        }else{
            noty()->error("Banner can't create!");
        }
        return redirect()->back();
    }

    public function edit($id){
        $banner = Banner::where('id',$id)->first();
        $banner_categories = Bannercategory::get();
        return view('backend.admin.banner.edit', compact('banner','banner_categories'));
    }

    public function update(Request $request):RedirectResponse{
        $validation = $request->validate([
            'name' => 'required',
        ]);
        $banner = Banner::where('id',$request->hidden_id)->first();
        $request_image = $request->file('image');
        if(!is_null($request_image)){
            $image_gen = hexdec(uniqid()) . '.' .$request_image->getClientOriginalExtension();
            $request_image->move(public_path('assets/images/banner'), $image_gen);
            $banner->update([
                'image' => 'assets/images/banner/'.$image_gen,
            ]);
        }

        $banner->update([
            'name' => $request->name,
            'link' => $request->link,
            'banner_category_id' => $request->banner_category_id,
            'status' =>  $request->status,
        ]);
        if($banner){
            noty()->info('Banner updated successfully.');
        }else{
            noty()->error("Banner can't update!");
        }
        return redirect()->back();
    }

    public function destroy($id){
        $banner = Banner::where('id',$id)->first();
        if(File::exists($banner->image)){
            File::delete($banner->image);
        }
        $banner->delete();
        if($banner){
            noty()->info('Banner deleted successfully.');
        }else{
            noty()->error("Banner can't delete!");
        }
        return redirect()->back();
    }

    public function status(Request $request){
        $banner =  Banner::where('id', $request->hidden_id)->first();
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
    public function getslug(Request $req){
        $link = SlugService::createSlug(Banner::class, 'link', $req->name);
        return response()->json([
            'status => true',
            'link' => $link
        ]);
    }
}
