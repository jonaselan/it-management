<?php

namespace itmanagement\Http\Controllers;

use itmanagement\Http\Requests\ClientRequest;
use itmanagement\Client;
use itmanagement\Repositories\Contracts\iLogoRepository;
use itmanagement\Traits\LogoTrait;

class ClientController extends Controller
{
    use LogoTrait;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $clients = Client::latest()->simplePaginate(7);
        return view('client.index')->withClients($clients);
    }

    public function create(){
        return view('client.create')
                ->with('logo', $this->retrieve());
    }

    public function store(ClientRequest $request, iLogoRepository $repository){
        if ($client = Client::create($request->all())) {
            flash("Cliente criado com sucesso!");
            if (!$repository->store($request, $client))
                flash("Problemas ao salvar logo!");
        }

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
        return view('client.edit', compact('client'))
                    ->with('logo', $this->retrieve($client));
    }

    public function update(iLogoRepository $repository, ClientRequest $request, $id){
        flash("Cliente editado com sucesso!");
        $client = Client::find($id);
        $client->update($request->all());

        if (!$repository->store($request, $client))
            flash("Problemas ao salvar logo!");

        return redirect()
            ->action('ClientController@index');
    }
}
