<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;

class ProfileController extends Controller
{
    //
    public function index(){
        $profile = User::where('id', Auth::user()->id)->first();
        return view('backend.admin.profile.index',compact('profile'));
    }
    public function store(Request $request){
        $image = $request->file('image');
        $user = User::where('id',Auth::user()->id)->first();

        if (!is_null($image)){
            if(File::exists($user->profile_photo_path)){
                File::delete($user->profile_photo_path);
            }
            $name_gen = hexdec(uniqid()) . '.' .$image->getClientOriginalExtension();
            $image->move(public_path('assets/images/user'), $name_gen);
            $user->update([
                'profile_photo_path' => 'assets/images/user/'.$name_gen
            ]);
        }

        if($request->password != null){
            if($request->password == $request->confirm_password){
                if(Hash::check($request->old_password, $user->password)){
                    $user->update([
                        'password' => Hash::make($request->password),
                    ]);
                }
                else{
                    noty()->error("Old Password didn't match!");
                    return redirect()->back();
                }
            }
            else{
                noty()->error("Password and Confirm password is different");
                return redirect()->back();
            }
            
        }

        $user->update([
            'name' => $request->name,
        ]);

        if($user){
            noty()->info('User update successfully.');
        }else{
            noty()->error("User can't updated!");
        }
        return redirect()->back();
    }
}
