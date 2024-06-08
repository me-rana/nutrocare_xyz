<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    //

    public function index(){
        $categories = Category::get();
        return view('backend.admin.category.index', compact('categories'));
    }

    public function create(){
        return view('backend.admin.category.create');
    }

    public function store(Request $request):RedirectResponse{
        $validation = $request->validate([
            'category_name' => 'required',
            'image' => 'required',
            'image.*' => 'mimes:jpg,png,webp,jpeg,gif,svg',
        ]);

        $request_image = $request->file('image');
        if(!is_null($request_image)){
            $image_gen = hexdec(uniqid()) . '.' .$request_image->getClientOriginalExtension();
            $request_image->move(public_path('assets/images/category'), $image_gen);
            $image = 'assets/images/category/'.$image_gen;
        }

        $category = Category::create([
            'category_name' => $request->category_name,
            'slug' => $request->slug,
            'status' => $request->status,
            'image' =>  $image,
            'description' => $request->description,
            'keywords' => $request->keyword,
            'short_description' => $request->description,
        ]);
        if($category){
            noty()->info('Banner Category updated successfully.');
        }else{
            noty()->error("Banner Category can't update!");
        }
        return redirect()->back();
    }

    public function edit($id){
        $category = Category::where('id',$id)->first();
        return view('backend.admin.category.edit',compact('category'));
    }

    public function update(Request $request):RedirectResponse{
        $validation = $request->validate([
            'category_name' => 'required'
        ]);

        $category = Category::where('id',$request->hidden_id)->first();
        $request_image = $request->file('image');
        if(!is_null($request_image)){
            $image_gen = hexdec(uniqid()) . '.' .$request_image->getClientOriginalExtension();
            $request_image->move(public_path('assets/images/category'), $image_gen);
            $category->update([
                'image' => 'assets/images/blog/'.$image_gen,
            ]);
        }
        $category->update([
            'category_name' => $request->category_name,
            'slug' => $request->slug,
            'status' => $request->status,
            'description' => $request->description,
            'keywords' => $request->keyword,
            'short_description' => $request->description,
        ]);
        if($category){
            noty()->info('Banner Category updated successfully.');
        }else{
            noty()->error("Banner Category can't update!");
        }
        return redirect()->back();
    }

    public function destroy($id){
        $category = Category::where('id',$id)->delete();
        if($category){
            noty()->info('Banner Category deleted successfully.');
        }else{
            noty()->error("Banner Category can't delete!");
        }
        return redirect()->back();
    }

    public function status(Request $request){
        $category =  Category::where('id', $request->hidden_id)->first();
        $category->update([
            'status' => $request->status,
        ]);
        if($category){
            noty()->info('Banner updated successfully.');
        }else{
            noty()->error("Banner can't update!");
        }
        return redirect()->back();
    }

    public function getslug(Request $req){
        $slug = SlugService::createSlug(Category::class, 'slug', $req->category_name);
        return response()->json([
            'status => true',
            'slug' => $slug
        ]);
    }
}
