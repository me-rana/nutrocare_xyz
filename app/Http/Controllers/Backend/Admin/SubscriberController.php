<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    //
    public function index(){
        $subscribers = Subscriber::all();
        return view('backend.admin.subscriber.index', compact('subscribers'));
    }
    public function destroy($id){
        $subscriber = Subscriber::where('id',$id)->delete();
        if($subscriber){
            noty()->info('Subscriber deleted successfully.');
        }else{
            noty()->error("Subscriber can't delete!");
        }
        return redirect()->back();
    }
}
