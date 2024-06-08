<?php

namespace App\Http\Controllers\Backend\Admin;

use File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function manage(){
        $admins = User::where('role_id',2)->get();
        $users = User::where('role_id', 1)->get();
        $suspends = User::where('role_id', null)->get();
        $data = compact(['admins','users','suspends']);
        return view('backend.admin.users.index')->with($data);
    }

    public function create(){
        return view('backend.admin.users.create');
    }

    public function store(Request $request):RedirectResponse{
        $validation = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role_id' => 'required',
            'password' => 'required',
        ]);
        $image = $request->file('image');
        $profile_photo_path = null; 
        if (!is_null($image)){
            $name_gen = hexdec(uniqid()) . '.' .$image->getClientOriginalExtension();
            $image->move(public_path('assets/images/user'), $name_gen);
            $profile_photo_path = 'assets/images/user/'.$name_gen;
        }
        

        $user = User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'password' => Hash::make($request->password),
            'role_id' =>  $request->role_id,
            'profile_photo_path' => $profile_photo_path
        ]);

        if($user){
            noty()->info('User created successfully.');
        }else{
            noty()->error("User can't created!");
        }
        return redirect()->back();

    }

    public function edit($id){
        $user = User::where('id', $id)->first();
        return view('backend.admin.users.edit',compact('user'));
    }

    public function update(Request $request){
        $image = $request->file('image');
        $user = User::where('id',$request->hidden_id)->first();

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
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $user->update([
            'name' => $request->name,
            'email' =>  $request->email,
            'role_id' =>  $request->role_id ?? $user->role_id,
        ]);

        if($user){
            noty()->info('User update successfully.');
        }else{
            noty()->error("User can't updated!");
        }
        return redirect()->back();
    }

    public function destroy($id){
        $user = User::where('id', $id)->first();
        if(File::exists($user->profile_photo_path)){
            File::delete($user->profile_photo_path);
        }
        $user->delete();

        if($user){
            noty()->info('User deleted successfully.');
        }else{
            noty()->error("User can't deleted!");
        }
        return redirect()->back();
    }
}
