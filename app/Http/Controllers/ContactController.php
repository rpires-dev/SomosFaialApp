<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }


    public function saveContact(Request $request)
    {
        $request->validate([
            'name'           => 'required',
            'email'          => 'required|email',
            'subject'        => 'required',
            'phone_number'  => 'required|numeric',
            'message'        => 'required',
        ]);

        Contact::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'subject'       => $request->subject,
            'phone_number' => $request->phone_number,
            'message'       => $request->message,
        ]);

        \Mail::send(
            'email.contact_email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'phone_number' => $request->get('phone_number'),
                'user_message' => $request->get('message'),
            ),
            function ($message) use ($request) {
                $message->from($request->email);
                $message->to('codingdriver15@gmail.com');
            }
        );

        return response()->json(['success' => 'Form is successfully submitted!']);
    }
}
