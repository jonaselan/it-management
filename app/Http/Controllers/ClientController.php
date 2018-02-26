<?php

namespace itmanagement\Http\Controllers;

use itmanagement\Http\Requests\ClientRequest;
use itmanagement\Client;
use DateTime;
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
        if ($file){
//            date_default_timezone_set('America/Recife');
            $data = new DateTime();
            $imageName = $data->format("Y-m-d").'.'.$file->getClientOriginalName();

            $s3 = Storage::disk('s3');
            $s3->put($imageName, file_get_contents($file));
        }

        Client::find($id)->update($request->all());
        return redirect()
            ->action('ClientController@index');
    }

//    public function storeFile(Request $request)
//    {
//
//    }
}
