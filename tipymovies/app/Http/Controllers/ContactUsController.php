<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactUs;

class ContactUsController extends Controller
{

    /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function contactUs(){
       return view('contactUs');
    }
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
 
    public function contactUsPost(Request $request){

        $this->validate($request, ['name' => 'required','email' => 'required|email','message' => 'required']);
        ContactUs::create($request->all());        
        Mail::send('email', array('name' => $request->get('name'), 'email' => $request->get('email'), 'user_message' => $request->get('message')), function($msj) use($request)
        {
            $msj->from($request->get('email'));
            $msj->to('tipymovies.contacto@gmail.com', 'artisan1234')->subject('Enviado por TipyMovies');
        });
            return back()->with('success', 'Gracias por contactarnos!');
 
        
    }
}
