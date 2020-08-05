<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

class PagesController extends Controller
{
    Public Function dosend(Request $request){

    	 $request->validate([
            'name' => 'required',
            'email'  => 'required|email',
            'subject'  => 'required',
            'body'  => 'required|min:10'
        ]);
    	 $name = $request->input('name');
    	 $email = $request->input('email');
    	 $subject = $request->input('subject');
    	 $body = $request->input('body');

    	 Mail::to('al3dnan@gmail.com')
    	 ->send(new ContactUs($name,$email,$subject,$body));

    	 return redirect('contact')->with('success','I got your answer and i will reply soon');

    }
}
