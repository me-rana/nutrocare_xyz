<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\Admin\BlogController;
use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\Admin\BannerController;
use App\Http\Controllers\Backend\Admin\SocialController;
use App\Http\Controllers\Backend\Admin\CompanyController;
use App\Http\Controllers\Backend\Admin\ContactController;
use App\Http\Controllers\Backend\Admin\IpblockController;
use App\Http\Controllers\Backend\Admin\ProfileController;
use App\Http\Controllers\Backend\Admin\CategoryController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\CustompageController;
use App\Http\Controllers\Backend\Admin\SubscriberController;
use App\Http\Controllers\Backend\Admin\BannercategoryController;

//Command through Route
Route::get('db-migrate', function(){ Artisan::call('migrate'); noty()->info('Migrate Successful'); return redirect()->back(); });
Route::get('db-seed', function(){ Artisan::call('db:seed'); noty()->info('Database Seed Successful'); return redirect()->back(); });
Route::get('optimize-clear', function(){ Artisan::call('optimize:clear'); noty()->info('Cache Clear Successful'); return redirect()->back(); });

//Auth Panel Distributors
Route::get('/redirects',[RedirectController::class,'controlPanel'])->name('Redirects');
Route::get('/logout', [RedirectController::class,'logout']);

Route::middleware(['hasaccess','filterip'])->group(function () {
    // Route::get('/',function(){
    //     return view('welcome');
    // });
    Route::get('/', [FrontendController::class, 'index'])->name('Home');
    Route::get('/category/{category}', [FrontendController::class, 'category'])->name('Category');
    Route::get('/page/{slug}', [FrontendController::class, 'page'])->name('Page');
    Route::get('/post/{category}/{post}', [FrontendController::class, 'post'])->name('Category Page');
});


//Normal User Panel
Route::middleware([
    'auth:sanctum',
    'role:1',
    'hasaccess',
    'filterip',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Admin Panel
Route::middleware([
    'auth:sanctum',
    'role:2',
    'hasaccess',
    'filterip',
    config('jetstream.auth_session'),
    'verified',
])->prefix('admin')->as('Admin ')->group(function () {
    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('Dashboard');
    //User Management
    Route::get('/users/manage',[UserController::class,'manage'])->name('User Management');
    Route::get('/user/create',[UserController::class,'create'])->name('User Create');
    Route::post('/user/store',[UserController::class,'store'])->name('User Store');
    Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('User Edit');
    Route::post('/user/update',[UserController::class,'update'])->name('User Update');
    Route::get('/user/delete/{id}',[UserController::class,'destroy'])->name('User Delete');
    //Profile Management
    Route::get('/profile/manage', [ProfileController::class,'index'])->name('Profile Management');
    Route::post('/profile/store', [ProfileController::class,'store'])->name('Profile Store');
    //Company Info Management
    Route::get('/company/manage', [CompanyController::class,'index'])->name('Company Management');
    Route::post('/company/store', [CompanyController::class,'store'])->name('Company Store');
    //Banner Management
    Route::get('/banner/manage',[BannerController::class, 'index'])->name('Banner Category Management');
    Route::get('/banner/create-category', [BannercategoryController::class,'create'])->name('Banner Category Create');
    Route::post('/banner/store-category', [BannercategoryController::class,'store'])->name('Banner Category Store');
    Route::get('/banner/edit-category/{id}', [BannercategoryController::class,'edit'])->name('Banner Category Edit');
    Route::post('/banner/update-category', [BannercategoryController::class,'update'])->name('Banner Category Update');
    Route::get('/banner/delete-category/{id}', [BannercategoryController::class,'destroy'])->name('Banner Category Delete');
    Route::post('/banner/status-category', [BannercategoryController::class,'status'])->name('Banner Category Status');
    Route::get('/banner/create', [BannerController::class,'create'])->name('Banner Create');
    Route::post('/banner/store', [BannerController::class,'store'])->name('Banner Store');
    Route::get('/banner/edit/{id}', [BannerController::class,'edit'])->name('Banner Edit');
    Route::post('/banner/update', [BannerController::class,'update'])->name('Banner Update');
    Route::get('/banner/delete/{id}', [BannerController::class,'destroy'])->name('Banner Delete');
    Route::post('/banner/status', [BannerController::class,'status'])->name('Banner Status');
    Route::get('/banner/getslug',[BannerController::class,'getslug'])->name('Banner Slug');
    //Custom Page Management
    Route::get('/custom-page/manage', [CustompageController::class,'index'])->name('Page Management');
    Route::get('/custom-page/create', [CustompageController::class,'create'])->name('Page Create');
    Route::post('/custom-page/store', [CustompageController::class,'store'])->name('Page Store');
    Route::get('/custom-page/edit/{id}', [CustompageController::class,'edit'])->name('Page Edit');
    Route::post('/custom-page/update', [CustompageController::class,'update'])->name('Page Update');
    Route::get('/custom-page/delete/{id}', [CustompageController::class,'destroy'])->name('Page Delete');
    Route::post('/custom-page/status', [CustompageController::class,'status'])->name('Page Status');
    //Social Management
    Route::get('/social/manage', [SocialController::class,'index'])->name('Social Management');
    Route::get('/social/create', [SocialController::class,'create'])->name('Social Create');
    Route::post('/social/store', [SocialController::class,'store'])->name('Social Store');
    Route::get('/social/edit/{id}', [SocialController::class,'edit'])->name('Social Edit');
    Route::post('/social/update', [SocialController::class,'update'])->name('Social Update');
    Route::get('/social/delete/{id}', [SocialController::class,'destroy'])->name('Social Delete');
    //Ip Block Management
    Route::get('/ip-block/manage', [IpblockController::class,'index'])->name('Ipblock Management');
    Route::get('/ip-block/create', [IpblockController::class,'create'])->name('Ipblock Create');
    Route::post('/ip-block/store', [IpblockController::class,'store'])->name('Ipblock Store');
    Route::get('/ip-block/edit/{id}', [IpblockController::class,'edit'])->name('Ipblock Edit');
    Route::post('/ip-block/update', [IpblockController::class,'update'])->name('Ipblock Update');
    Route::get('/ip-block/delete/{id}', [IpblockController::class,'destroy'])->name('Ipblock Delete');
    //Contact Management
    Route::get('/contact/manage', [ContactController::class, 'index'])->name('Contact Management');
    Route::get('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('Contact Delete');
    //Subscriber Management
    Route::get('/subscriber/manage', [SubscriberController::class, 'index'])->name('Subscriber Management');
    Route::get('/subscriber/delete/{id}', [SubscriberController::class, 'destroy'])->name('Subscriber Delete');
    //Category Management
    Route::get('/category/manage',[CategoryController::class, 'index'])->name('Category Management');
    Route::get('/category/create', [CategoryController::class,'create'])->name('Category Create');
    Route::post('/category/store', [CategoryController::class,'store'])->name('Category Store');
    Route::get('/category/edit/{id}', [CategoryController::class,'edit'])->name('Category Edit');
    Route::post('/category/update', [CategoryController::class,'update'])->name('Category Update');
    Route::get('/category/delete/{id}', [CategoryController::class,'destroy'])->name('Category Delete');
    Route::post('/category/status', [CategoryController::class,'status'])->name('Category Status');
    Route::get('/category/getslug',[CategoryController::class,'getslug'])->name('Category Slug');
    //Blog Management
    Route::get('/blog/manage',[BlogController::class, 'index'])->name('Blog Management');
    Route::get('/blog/create', [BlogController::class,'create'])->name('Blog Create');
    Route::post('/blog/store', [BlogController::class,'store'])->name('Blog Store');
    Route::get('/blog/edit/{id}', [BlogController::class,'edit'])->name('Blog Edit');
    Route::post('/blog/update', [BlogController::class,'update'])->name('Blog Update');
    Route::get('/blog/delete/{id}', [BlogController::class,'destroy'])->name('Blog Delete');
    Route::post('/blog/status', [BlogController::class,'status'])->name('Blog Status');
    Route::get('/blog/getslug',[BlogController::class,'getslug'])->name('Blog Slug');

});
