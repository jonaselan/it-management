<?php

namespace itmanagement\Http\Controllers;

use itmanagement\Http\Requests\ClientRequest;
use itmanagement\Client;
use Storage;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $clients = Client::simplePaginate(7);

        return view('client.index')->withClients($clients);
    }

    public function create(){
        return view('client.create');
    }

    public function store(ClientRequest $request){
        flash("Cliente criado com sucesso!");
        Client::create($request->all());
        return redirect()
            ->action('ClientController@index');
    }

    public function destroy($id){
        flash("Cliente removido com sucesso!");
        Client::find($id)->delete();
        return redirect()
            ->action('ClientController@index');
    }

    public function edit($id){
        $client = Client::find($id);
        return view('client.edit', compact('client'));
    }

    public function update(ClientRequest $request, $id){
        flash("Cliente editado com sucesso!");

        $file = $request->file('logo');
        // TODO: move to repository
        $file->store('');

        Client::find($id)->update($request->all());
        return redirect()
            ->action('ClientController@index');
    }
}
