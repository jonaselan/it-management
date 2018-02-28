<?php

namespace itmanagement\Http\Controllers;

use itmanagement\System;
use itmanagement\Repositories\Contracts\iLogoRepository;
use itmanagement\Traits\LogoTrait;
use itmanagement\Repositories\Contracts\iProjectRepository;
use itmanagement\Http\Requests\SystemRequest;
use Request;
use Auth;

class SystemController extends Controller
{
    use LogoTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $systems = System::latest()->simplePaginate(7);

        return view('system.index')->withSystems($systems);
    }

    public function create(iProjectRepository $repository){
        $projects = $repository
                        ->find([['client_id', '=', Auth::user()->client_id]])
                        ->pluck('name', 'id');

        return view('system.create')
            ->with('projects_options', $projects)
            ->with('logo', $this->retrieve());
    }

    public function store(SystemRequest $request, iLogoRepository $repository){
        if ($system= System::create($request->all())) {
            flash("Serviço criado com sucesso!");
            if (!$repository->store($request, $system))
                flash("Problemas ao salvar logo!");
        }

        return redirect()
            ->action('SystemController@index');
    }

    public function destroy($id){
        flash("Serviço removido com sucesso!");
        System::find($id)->delete();
        return redirect()
            ->action('SystemController@index');
    }

    public function edit($id, iProjectRepository $repository){
        $system = System::find($id);
        $projects = $repository
            ->find([['client_id', '=', Auth::user()->client_id]])
            ->pluck('name', 'id');

        return view('system.edit', compact('system'))
            ->with('projects_options', $projects)
            ->with('logo', $this->retrieve($system));
    }

    public function update(SystemRequest $request, iLogoRepository $repository, $id){
        flash("Serviço editado com sucesso!");

        $system = System::find($id);
        $system->update($request->all());

        if (!$repository->store($request, $system))
            flash("Problemas ao salvar logo!");

        return redirect()
            ->action('SystemController@index');
    }

//    public function show($id){
//        $response = System::find($id);
//        return view('system.show')->with('p', $response);
//    }
}
