<?php

namespace itmanagement\Http\Controllers;

use itmanagement\Http\Requests\ClientRequest;
use itmanagement\Client;
use itmanagement\Logo;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use \Exception;

class ClientController extends Controller
{
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
        $result = null;

        try {
            $key = $client->logos()->first()->path;
            $s3Client = new S3Client([
                'region' => env('AWS_DEFAULT_REGION'),
                'version'=> env('AWS_API_VERSION')
            ]);
            $result = $s3Client->getObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key'    => $key
            ]);
        }catch (AwsException $e) {
            report($e);
        }catch (Exception $e){
            report($e);
        }

        return view('client.edit', compact('client'))
                    ->with('logo', $result['@metadata']['effectiveUri']);
    }

    public function update(ClientRequest $request, $id){
        flash("Cliente editado com sucesso!");
        $client = Client::find($id);
        $client->update($request->all());

        $file = $request->file('logo');
        if (!is_null($file) && $path = $file->store('images')) {
            // TODO: move to repository
            $logo = new Logo();
            $logo->name = $file->getClientOriginalName();
            $logo->path = $path;
            $logo->uploadable_id = $client->id;
            $logo->uploadable_type = 'itmanagement\Client';
            $logo->save();
        }

        return redirect()
            ->action('ClientController@index');
    }
}
