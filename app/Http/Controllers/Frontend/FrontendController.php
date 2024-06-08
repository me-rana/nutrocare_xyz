<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Banner;
use App\Models\Category;
use App\Models\CustomPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    //
    public function index(){
        if(Session::get('post')){
            $readposts = Blog::where(['status' => 1])->whereIn('slug',Session::get('post'))->get();
        }
        else{
            $readposts = [];
        }
        return view('frontend.index')->with(
            [
                'banners' => Banner::where('banner_category_id',1)->get(),
                'categories' => Category::where('status',1)->get(),
                'posts' => Blog::where('status',1)->get(),
                'pages' => CustomPage::where('status',1)->get(),
                'read_posts' => $readposts ?? '',
            ]
        );
    }

    public function category($category){
        $category = Category::where(['status' => 1, 'slug' => $category])->first(); 
        if($category){
            $posts = Blog::where(['status' => 1, 'category' => $category->id])->get();
        }
        else{
            $posts = Blog::where(['status' => 1])->get();
        }

        if(Session::get('post')){
            $readposts = Blog::where(['status' => 1])->whereIn('slug',Session::get('post'))->get();
        }
        else{
            $readposts = [];
        }
        return view('frontend.index')->with(
            [
                'banners' => Banner::where('banner_category_id',1)->get(),
                'categories' => Category::where('status',1)->get(),
                'posts' => $posts ?? '',
                'pages' => CustomPage::where('status',1)->get(),
                'read_posts' => $readposts ?? '',
            ]
        );
    }

    public function page($slug){
        return view('frontend.custom-page')->with(
            [
                'banners' => Banner::where('banner_category_id',1)->get(),
                'categories' => Category::where('status',1)->get(),
                'pages' => CustomPage::where('status',1)->get(),
                'pageInfo' => CustomPage::where(['status' => 1, 'slug' => $slug])->first(),
            ]
        );
    }


    public function post($category, $post){
        $category_id = Category::where(['status' => 1, 'slug' => $category])->first()->id; 
        $current_session = [];
        $old_sessions = Session::get('post',[]);
        foreach($old_sessions as $session){
             array_push($current_session, $session);
        }
        if(!in_array($post,$old_sessions)){
            array_push($current_session, $post);
        }
        Session::put('post',$current_session);    

        if(Session::get('post')){
            $readposts = Blog::where(['status' => 1])->whereIn('slug',Session::get('post'))->get();
        }
        else{
            $readposts = [];
        }
        return view('frontend.post')->with(
            [
                'banners' => Banner::where('banner_category_id',1)->get(),
                'categories' => Category::where('status',1)->get(),
                'post' => Blog::where(['status' => 1, 'category' => $category_id,'slug' =>$post])->first(),
                'pages' => CustomPage::where('status',1)->get(),
                'read_posts' => $readposts ?? '',
                'recent_posts' => Blog::where(['status' => 1])->limit(5)->get(),
                'related_posts' => Blog::where(['status' => 1, 'category' => $category_id])->limit(5)->get(),
            ]
        );
    }
}
