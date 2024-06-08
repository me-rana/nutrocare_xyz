<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Cviebrock\EloquentSluggable\Services\SlugService;

class BlogController extends Controller
{
    //
    public function index(){
        $categories = Category::get();
        $banners = Blog::get();
        return view('backend.admin.blog.index', compact('categories','banners'));
    }
    public function create(){
        $categories = Category::get();
        return view('backend.admin.blog.create', compact('categories'));
    }
    public function store(Request $request):RedirectResponse{
        $validation = $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,png,webp,jpeg,gif,svg',
        ]);
        $request_image = $request->file('image');
        if(!is_null($request_image)){
            $image_gen = hexdec(uniqid()) . '.' .$request_image->getClientOriginalExtension();
            $request_image->move(public_path('assets/images/blog'), $image_gen);
            $image = 'assets/images/blog/'.$image_gen;
        }

        $blog = Blog::create([
            'title' => $request->title,
            'slug' => $request->link,
            'category' => $request->category,
            'image' => $image,
            'description' =>  $request->description,
            'keywords' => $request->keyword,
            'short_description' => $request->short_description,
            'status' =>  $request->status,
        ]);
        if($blog){
            noty()->info('Blog created successfully.');
        }else{
            noty()->error("Blog can't create!");
        }
        return redirect()->back();
    }

    public function edit($id){
        $blog = Blog::where('id',$id)->first();
        $categories = Category::get();
        return view('backend.admin.blog.edit', compact('blog','categories'));
    }

    public function update(Request $request):RedirectResponse{
        $validation = $request->validate([
            'title' => 'required',
        ]);
        $blog = Blog::where('id',$request->hidden_id)->first();
        $request_image = $request->file('image');
        if(!is_null($request_image)){
            $image_gen = hexdec(uniqid()) . '.' .$request_image->getClientOriginalExtension();
            $request_image->move(public_path('assets/images/blog'), $image_gen);
            $blog->update([
                'image' => 'assets/images/blog/'.$image_gen,
            ]);
        }

        $blog->update([
            'title' => $request->title,
            'slug' => $request->link,
            'category' => $request->category,
            'description' =>  $request->description,
            'keywords' => $request->keyword,
            'short_description' => $request->short_description,
            'status' =>  $request->status,
        ]);
        if($blog){
            noty()->info('Blog updated successfully.');
        }else{
            noty()->error("Blog can't update!");
        }
        return redirect()->back();
    }

    public function destroy($id){
        $blog = Blog::where('id',$id)->first();
        if(File::exists($blog->image)){
            File::delete($blog->image);
        }
        $blog->delete();
        if($blog){
            noty()->info('Blog deleted successfully.');
        }else{
            noty()->error("Blog can't delete!");
        }
        return redirect()->back();
    }

    public function status(Request $request){
        $blog =  Blog::where('id', $request->hidden_id)->first();
        $blog->update([
            'status' => $request->status,
        ]);
        if($blog){
            noty()->info('Blog updated successfully.');
        }else{
            noty()->error("Blog can't update!");
        }
        return redirect()->back();
    }
    public function getslug(Request $req){
        $slug = SlugService::createSlug(Blog::class, 'slug', $req->title);
        return response()->json([
            'status => true',
            'slug' => $slug
        ]);
    }
}
