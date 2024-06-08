<?php

namespace App\Http\Controllers\Backend\Admin;

use File;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    //
    public function index(){
        $company = Company::first();
        return view('backend.admin.company.index',compact('company'));
    }

    public function store(Request $request):RedirectResponse{
        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'support' =>  'required',
            'email' =>  'required',
            'address' => 'required',
        ]);
        $request_logo = $request->file('logo');
        $request_favicon = $request->file('favicon');
        $company = Company::first();

        if(!is_null($request_logo)){
            if(File::exists($company->logo)){
                File::delete($company->logo);
            }
            $logo_gen = hexdec(uniqid()) . '.' .$request_logo->getClientOriginalExtension();
            $request_logo->move(public_path('assets/images/logo'), $logo_gen);
            $logo = 'assets/images/logo/'.$logo_gen;

        }

        if(!is_null($request_favicon)){
            if(File::exists($company->favicon)){
                File::delete($company->favicon);
            }
            $favicon_gen = hexdec(uniqid()) . '.' .$request_favicon->getClientOriginalExtension();
            $request_favicon->move(public_path('assets/images/logo'), $favicon_gen);
            $favicon = 'assets/images/logo/'.$favicon_gen;
        }

        
        
        $company->update([
            'name' =>  $request->name,
            'logo' =>  $logo ?? $company->logo,
            'favicon' => $favicon ?? $company->favicon,
            'description' => $request->description,
            'phone' => $request->phone,
            'support' =>  $request->support,
            'email' =>  $request->email,
            'address' => $request->address,
            'others' =>  $request->others,
            'copyright' => $request->copyright
        ]);
        if($company){
            noty()->info('Company Info updated successfully.');
        }else{
            noty()->error("Company Info can't update!");
        }
        return redirect()->back();
    }
}
