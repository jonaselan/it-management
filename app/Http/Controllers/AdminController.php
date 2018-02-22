<?php

namespace itmanagement\Http\Controllers;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // after :, put a guard
        $this->middleware('auth:admin');
    }

    public function index()
    {
//        flash("Bem vindo, ". Auth::user()->name);
        return view('auth.admin.index');
    }
}
