<?php

namespace itmanagement\Http\Controllers;

use Illuminate\Http\Request;
use itmanagement\Client;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $clients = Client::simplePaginate(7);

        return view('clients.index')->withClients($clients);
    }
}
