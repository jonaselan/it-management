<?php

namespace itmanagement\Http\Controllers;

use Illuminate\Support\Facades\DB;
use itmanagement\Project;
use Illuminate\Auth\Middleware\Authenticate;
use itmanagement\Http\Requests\ProjectRequest;
use Request;
use Debugbar;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::simplePaginate(7);
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
