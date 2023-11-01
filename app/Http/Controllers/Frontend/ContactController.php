<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactNotification;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
   public function contact(){
      $data['setting'] = Setting::first();
      return view('frontend.home.contact');
   }

   public function addContact(Request $request){

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|digits:11|numeric',
        'message' => 'required',
    ]);

    $contact = new Contact();
    $contact->name=$request->name;
    $contact->email=$request->email;
    $contact->phone=$request->phone;
    $contact->message=$request->message;
    $contact->save();
    $users = User::where('is_admin',true)->get();
    Notification::send($users, new ContactNotification($contact));
    Toastr::success('Contact successfully added', 'success');
    return redirect()->back();

}
}
