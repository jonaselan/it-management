<?php

namespace itmanagement\Http\Controllers;

use itmanagement\Project;
use itmanagement\Http\Requests\ProjectRequest;
use Auth;
use Request;
use itmanagement\Repositories\Contracts\iProjectRepository;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(iProjectRepository $repository){
        // If use repository, remember to get element with ->get(), and the end
        $projects = $repository
                        ->find([['client_id', '=', Auth::user()->client_id]],
                                [['created_at', 'asc']]);

        return view('project.index')
                    ->withProjects($projects->simplePaginate(10));
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
//        $response = Projects::find($id);
//        return view('project.show')->with('p', $response);
//    }
}
