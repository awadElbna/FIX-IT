<?php

namespace App\Http\Controllers;
use App\Faq;
use Mail;
use Illuminate\Http\Request;


class ContactusController extends Controller {

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        return view('contactus');
    } 
     public function send(Request $request) {
         
         $data=$request->all();
         $mail["email"]=$request->InputEmail;
         $mail["name"]=$request->InputName;

         Mail::send(['html' => 'contact'], $data, function ($message) use ($data, $mail) {

                $message->from('marwa.elmenawy91@gmail.com', 'hamada');

                $message->sender('marwa.elmenawy91@gmail.com', 'hamada');

                $message->to('kamelm141@yahoo.com', "sala7ly");

                $message->subject('Contact us');

                $message->priority(3);
            });
        return view('contactus');
    } 

}
