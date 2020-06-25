<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
class ContactUsController extends Controller
{
    public function contactUs()
    {
        return view('contact_us');
    }// end of index

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $subscriber = new Contact();
        $subscriber->name = $request->name;
        $subscriber->email = $request->email;
        $subscriber->subject = $request->subject;
        $subscriber->message = $request->message;
        $subscriber->save();
        return response(['status'=>true,'message'=>'تم ارسال الرسالة بنجاح'],200);
    }
    
}//end of controller
