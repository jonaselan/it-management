@extends('layout.application')
@section('content')
  <h1>Novo sistema</h1>

  <div class="container">
    @if ($errors->any())
      <ul class="alert alert-warning">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    {!! Form::open(['url'=>"systems", 'method'=>'post', 'files' => true])!!}
        @include('system._form')
    {!! Form::close() !!}
  </div>
@stop
