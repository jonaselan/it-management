<?php

namespace itmanagement\Http\Controllers;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        flash("Bem vindo, ". Auth::user()->name);
        return view('home');
    }
}
