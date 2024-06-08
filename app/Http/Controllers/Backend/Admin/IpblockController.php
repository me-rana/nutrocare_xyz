<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\IpBlock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class IpblockController extends Controller
{
    //
    public function index(){
        $ip_blocks = IpBlock::all();
        return view('backend.admin.ip-block.index', compact('ip_blocks'));
    }
    public function create(){
        return view('backend.admin.ip-block.create');
    }
    public function store(Request $request):RedirectResponse{
        $validation = $request->validate([
            'ip_no' => 'required',
            'reason' => 'required',
        ]);
        $ip_block = IpBlock::create([
            'ip_no' =>  $request->ip_no,
            'reason' => $request->reason
        ]);
        if($ip_block){
            noty()->info('Ip Block created successfully.');
        }else{
            noty()->error("Ip Block page can't create!");
        }
        return redirect()->back();
    }

    public function edit($id){
        $ip_block = IpBlock::where('id', $id)->first();
        return view('backend.admin.ip-block.edit', compact('ip_block'));
    }

    public function update(Request $request):RedirectResponse{
        $validation = $request->validate([
            'ip_no' => 'required',
            'reason' => 'required',
        ]);
        $ip_block = IpBlock::where('id',$request->hidden_id)->first();
        $ip_block->update([
            'ip_no' => $request->ip_no,
            'reason' =>  $request->reason
        ]);
        if($ip_block){
            noty()->info('Ip Block updated successfully.');
        }else{
            noty()->error("Ip Block page can't update!");
        }
        return redirect()->back();
    }
    public function destroy($id){
        $ip_block = IpBlock::where('id', $id)->delete();
        if($ip_block){
            noty()->info('Ip Block deleted successfully.');
        }else{
            noty()->error("Ip Block page can't delete!");
        }
        return redirect()->back();
    }
}
