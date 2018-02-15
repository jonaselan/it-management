<?php

namespace itmanagement\Http\Controllers;

use itmanagement\Project;
use itmanagement\Http\Requests\ProjectRequest;
use Auth;
use Request;
use Debugbar;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $projects = Project::where('client_id', Auth::user()->client_id)
                            ->simplePaginate(7);

        return view('project.index')->withProjects($projects);
    }

    public function create(){
        return view('project.create');
    }

    public function store(ProjectRequest $request){
        Project::create($request->all());
        return redirect()
            ->action('ProjectController@index');
    }

    public function destroy($id){
        Project::find($id)->delete();
        return redirect()
            ->action('ProjectController@index');
    }

    public function edit($id){
        $project = Project::find($id);
        return view('project.edit', compact('project'));
    }

    public function update(ProjectRequest $request, $id){
        Project::find($id)->update($request->all());
        return redirect()
            ->action('ProjectController@index');
    }

//    public function show($id){
//        $response = Project::find($id);
//        return view('project.show')->with('p', $response);
//    }
}
