@extends('layout.application')
@section('content')
  <h1>Editar sistema</h1>

  <div class="container">
    @if ($errors->any())
      <ul class="alert alert-warning">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {{ Form::model($system, ['method' => 'put', 'route' => ['systems.update', $system->id]]) }}
        @include('system._form')
    {!! Form::close() !!}
  </div>
@stop
