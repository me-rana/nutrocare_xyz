<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    //
    public function index(){
        $contacts = Contact::all();
        return view('backend.admin.contact.index', compact('contacts'));
    }
    public function destroy($id){
        $contact = Contact::where('id',$id)->delete();
        if($contact){
            noty()->info('Contact deleted successfully.');
        }else{
            noty()->error("Contact can't delete!");
        }
        return redirect()->back();
    }
}
