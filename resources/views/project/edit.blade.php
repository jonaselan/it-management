@extends('layout.application')
@section('content')
  <h1>Novo projeto</h1>

  <div class="container">
    @if ($errors->any())
      <ul class="alert alert-warning">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {{ Form::model($project, ['method' => 'put', 'route' => ['projects.update', $project->id]]) }}
        @include('project._form')
    {!! Form::close() !!}
  </div>
@stop
