<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create(){
        return view('contacts');
    }

    public function store(){

        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // Mail::raw(request('message'), function ($message) {
        //     $message->from(request('email'), request('name'));
        //     $message->to('Admin@gmail.com');
        // });
        Mail::to(request('email'))->send(new Contact(request('email'), request('name')));
        // $data = ['jks'];
        // Mail::send('mail.contact-me', $data, function ($message) {
        //     $message->from(request('email'), request('name'));
        //     $message->to('ADmin@gmailc.om');
        // });
        return redirect(route('contacts.create'))->with('message', 'All done!!!');

    }
}
