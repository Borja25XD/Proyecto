<?php

namespace App\Http\Controllers;

use App\Mail\ContactSended;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("contact");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->email == null){
            $request->email == auth()->user()->email;
        }
        Mail::to("admin@futpad.es")->queue(new ContactSended($request));
        return redirect('/enviado');
    }
}
