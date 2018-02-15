<?php

namespace itmanagement\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("clients.index");
    }
}
