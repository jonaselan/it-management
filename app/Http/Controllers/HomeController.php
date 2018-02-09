<?php

namespace itmanagement\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Initial page for application
     *
     * @return view
     */
    public function index()
    {
        return view('home page');
    }
}