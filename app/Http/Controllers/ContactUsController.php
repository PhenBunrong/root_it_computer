<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index(){
        return view('frontEnd.contact_us.index');
    }

    public function contact(Request $request){
        $data = $request->all();
        //echo "<pre>"; print_r($data); die;

        $email = "Phearong349@gmail.com";
        $messageData = [
            'e_title' => $data['e_title'],
            'e_fullname' => $data['e_fullname'],
            'e_email' => $data['e_email'],
            'e_country' => $data['e_country'],
            'e_subject' => $data['e_subject'],
            'e_comment' => $data['e_comment']
        ];
        Mail::send('emails.enquiry', $messageData, function($message)use($email){
            $message->to($email)->subject('Enquiry from E-com Website');
        });

        return redirect()->back()->with('flash_message_success','Thanks for your enquiry, We will get back to you soon');
        /* echo "test"; die; */
    }
}
